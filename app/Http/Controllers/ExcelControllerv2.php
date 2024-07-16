<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistema\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function processUpload(Request $request)
    {
        // Validação do arquivo
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx|max:10240', // Ajuste o tamanho máximo conforme necessário
        ]);

        // Etapa 1: Comparando informações com o banco de dados
        session()->flash('status', 'Comparando informações com o banco de dados');

        $newCompanies = [];

        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');

            // Verificar se há informações no array antes de acessar o índice 0
            $newCompanies = Excel::toArray([], $file)[0];
            $newCompanies = isset($excelData[0]) ? $excelData[0] : [];
        }

        $existingCompanies = Company::all()->toArray();
        $missingCompanies = [];

        foreach ($existingCompanies as $existingCompany) {
            $existingKey = $this->generateComparisonKey($existingCompany);
            $found = false;

            foreach ($newCompanies as $newCompany) {
                $newKey = $this->generateComparisonKey($newCompany);

                if ($existingKey === $newKey) {
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                // Adicionar a empresa ausente ao array
                $missingCompanies[] = $existingCompany;

                // Inserir a nova empresa no banco de dados
                Company::create([
                    'name' => $existingCompany['name'],
                    'cnpj' => $existingCompany['cnpj'],
                    'fantasyname' => $existingCompany['fantasyname'],
                    'lives' => $existingCompany['lives'],
                    'value_lives' => $existingCompany['value_lives'],
                    // Adicione outros campos conforme necessário
                ]);
            }
        }

        // Etapa 2: Carregamento completo
        session()->flash('status', 'Carregamento completo');

        // Geração de arquivos Excel para as novas empresas e empresas ausentes
        $newCompaniesFilePath = $this->generateExcelFile($newCompanies, 'New_companies.xlsx');
        $missingCompaniesFilePath = $this->generateExcelFile($missingCompanies, 'missing_companies.xlsx');

        // Armazenar os caminhos dos arquivos nas sessões
        session()->flash('newCompaniesFile', $newCompaniesFilePath);
        session()->flash('missingCompaniesFile', $missingCompaniesFilePath);

        // Redirecionamento de volta à página anterior com uma mensagem de sucesso
        return redirect()->back()->with('message', 'Upload e processamento concluídos com sucesso!');
    }

    private function generateComparisonKey(array $data)
    {
        // Verificação da existência das chaves e conversão para minúsculas
        $name = array_key_exists('name', $data) ? $data['name'] : '';
        $cnpj = array_key_exists('cnpj', $data) ? $data['cnpj'] : '';
        $fantasyname = array_key_exists('fantasyname', $data) ? $data['fantasyname'] : '';
        $lives = array_key_exists('lives', $data) ? $data['lives'] : '';
        $value_lives = array_key_exists('value_lives', $data) ? $data['value_lives'] : '';

        return md5(strtolower($name) . strtolower($cnpj) . strtolower($fantasyname) . $lives . $value_lives);
    }

    private function generateExcelFile(array $data, string $filename)
{
    $filePath = storage_path("app/excel/{$filename}");

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

    return $filePath;
}



    public function downloadExcel($filename)
    {
        $filePath = storage_path("app/excel/{$filename}");

        return response()->download($filePath, $filename)->deleteFileAfterSend(true);
    }

};