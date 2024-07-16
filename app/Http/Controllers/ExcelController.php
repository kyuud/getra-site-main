<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistema\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function processUpload(Request $request)
    {
        Log::info('Iniciando o processo de upload de arquivo Excel.');

        // Validação do arquivo
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx|max:10240', // Arquivo Excel de até 10MB
        ]);

        // Verificar se o arquivo foi carregado corretamente
        if (!$request->hasFile('excel_file')) {
            Log::error('Nenhum arquivo foi enviado.');
            return back()->withErrors(['excel_file' => 'Nenhum arquivo foi enviado.']);
        }

        $file = $request->file('excel_file');

        try {
            // Verificar se há informações no array antes de acessar o índice 0; se não houver, retorna um array vazio
            $newCompanies = Excel::toArray([], $file)[0] ?? [];

            if (empty($newCompanies)) {
                Log::warning('O arquivo enviado está vazio.');
                return back()->withErrors(['excel_file' => 'O arquivo enviado está vazio.']);
            }

            // Inicializar array para armazenar informações do banco antes da atualização
            $updatedCompanies = [];

            // Iterar sobre as empresas da planilha, começando da segunda linha (índice 1)
            for ($i = 1; $i < count($newCompanies); $i++) {
                $newCompany = array_combine($newCompanies[0], $newCompanies[$i]);

                // Ignorar linhas onde a coluna CNPJ estiver vazia
                if (empty($newCompany['CNPJ'])) {
                    Log::warning('Linha ignorada devido à ausência de CNPJ:', $newCompany);
                    continue;
                }

                // Verifica se todos os campos obrigatórios estão presentes
                if ($this->validateCompanyData($newCompany)) {
                    $formattedDocument = $this->formatCnpjCpfCno($newCompany['CNPJ']);
                    $existingCompany = Company::where('cnpj', $formattedDocument)->first();

                    // Adiciona ao log a informação do processamento quando há sucesso na localização do CNPJ
                    Log::info('Atualizando informações no banco de dados: ' . $formattedDocument);

                    if ($existingCompany) {
                        // Adicionar informações do banco antes da atualização ao array
                        $updatedCompanies[] = $existingCompany->toArray();

                        // Atualizar informações no banco de dados
                        $existingCompany->update([
                            'name' => $newCompany['Nome'],
                            'cnpj' => $formattedDocument,
                            'fantasyname' => $newCompany['Nome Fantasia'] ?? null,
                            'street' => $newCompany['Rua'] ?? null,
                            'number' => $newCompany['Número'] ?? null,
                            'neighborhood' => $newCompany['Bairro'] ?? null,
                            'complement' => $newCompany['Complemento'] ?? null,
                            'city' => $newCompany['Cidade'] ?? null,
                            'state' => $newCompany['Estado'] ?? null,
                            'email' => $newCompany['E-mail'] ?? null,
                            'phone' => $newCompany['Telefone'] ?? null,
                            'lives' => $newCompany['Vidas'] ?? null,
                            'value_lives' => $newCompany['Valor da vida'] ?? null,
                            'status' => (int)$newCompany['Status'] ?? 0,
                        ]);
                    } else {
                        // Se o dado da planilha de entrada não existe no banco, adiciona ao banco de dados
                        Company::create([
                            'name' => $newCompany['Nome'],
                            'cnpj' => $formattedDocument,
                            'fantasyname' => $newCompany['Nome Fantasia'] ?? null,
                            'street' => $newCompany['Rua'] ?? null,
                            'number' => $newCompany['Número'] ?? null,
                            'neighborhood' => $newCompany['Bairro'] ?? null,
                            'complement' => $newCompany['Complemento'] ?? null,
                            'city' => $newCompany['Cidade'] ?? null,
                            'state' => $newCompany['Estado'] ?? null,
                            'email' => $newCompany['E-mail'] ?? null,
                            'phone' => $newCompany['Telefone'] ?? null,
                            'lives' => $newCompany['Vidas'] ?? null,
                            'value_lives' => $newCompany['Valor da vida'] ?? null,
                            'status' => (int)$newCompany['Status'] ?? 0,
                        ]);
                        Log::info('Empresa adicionada ao banco de dados: ' . $formattedDocument);
                    }
                } else {
                    // alerta de não localização no banco
                    Log::warning('Dados insuficientes para adicionar/atualizar empresa:', $newCompany);
                }
            }

            // Adicione a data e hora atual ao nome do arquivo (timestamp)
            $now = now()->format('Ymd_His');
            $filename = "updated_companies_{$now}.xlsx";

            // Gerar arquivo Excel com informações do banco antes da atualização
            $this->generateExcelFile($updatedCompanies, $filename);

            // Redirecionar de volta à página anterior com uma notificação
            return back()->with('success', 'Inclusão realizada com sucesso.');
        } catch (\Exception $e) {
            Log::error('Erro ao processar o arquivo Excel: ', ['message' => $e->getMessage()]);
            return back()->withErrors(['excel_file' => 'Erro ao processar o arquivo Excel.']);
        }
    }

    private function generateExcelFile(array $data, string $filename)
    {
        // Define o caminho para gerar o arquivo
        $filePath = storage_path("app/excel/{$filename}");

        Log::info("Gerando arquivo Excel no seguinte caminho: $filePath");

        // Função principal de geração de arquivo
        Excel::store(new class($data) implements FromCollection {
            private $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function collection()
            {
                return collect($this->data);
            }
        }, $filename, 'excel');

        Log::info("Arquivo gerado com sucesso no caminho: $filePath");

        return $filePath;
    }

    private function validateCompanyData(array $data)
    {
        $requiredFields = ['Nome', 'CNPJ'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }

    private function formatCnpjCpfCno($value)
    {
        $cnpj_cpf_cno = preg_replace("/\D/", '', $value);

        if (strlen($cnpj_cpf_cno) === 11) {
            // CPF
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf_cno);
        } elseif (strlen($cnpj_cpf_cno) === 14) {
            // CNPJ
            return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf_cno);
        } elseif (strlen($cnpj_cpf_cno) === 12) {
            // CNO
            return preg_replace("/(\d{2})(\d{3})(\d{5})(\d{2})/", "\$1.\$2.\$3/\$4", $cnpj_cpf_cno);
        }

        return $value; // Retorna o valor original se não corresponder a nenhum dos formatos esperados
    }

    public function downloadUpdatedCompanies()
    {
        $directory = storage_path("app/excel");

        Log::info("Tentando baixar o arquivo do diretório: $directory");

        $files = glob($directory . '/*.xlsx');

        if (!empty($files)) {
            // Ordena os arquivos por data de modificação em ordem decrescente
            usort($files, function ($a, $b) {
                return filemtime($b) - filemtime($a);
            });

            $latestFile = $files[0];

            Log::info("Arquivo encontrado, iniciando download: $latestFile");

            return response()->download($latestFile, basename($latestFile));
        } else {
            Log::error("Nenhum arquivo encontrado no diretório: $directory");

            // Se nenhum arquivo for encontrado, retorna a informação abaixo em json:
            return response()->json(['error' => 'Nenhum arquivo encontrado.']);
        }
    }

    public function testDatabaseQuery()
    {
        // Substitua 'your_cnpj_value' pelo CNPJ específico que está causando problemas
        $cnpj = '12445154000176';

        $result = DB::table('system_companies')->where('cnpj', $cnpj)->first();

        dd($result);
    }
}
