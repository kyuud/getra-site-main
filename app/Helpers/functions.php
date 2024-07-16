<?php

    use App\Models\Painel\Trail;
    use Illuminate\Support\Facades\Auth;
    use \App\Http\Controllers\Painel\TrailController;
    use Cocur\Slugify\Slugify;

    /**
     * PEGA A EXTENSÃO DE UMA ARQUIVO
     * @param String $file
     * @return false|string
     */
    function getExtension(string $file)
    {
        # RETORNA A EXTENSÃO DO ARQUIVO
        return substr($file, -3, 3);
    }


    /**
     * PEGAR O NOME COMPELTO DO MÊS DE ACORDO COM A STRING PASSADA
     * @param String $number DUAS CASAS DECIMAIS
     * @return bool|string
     */
    function getMonth(String $number)
    {
        switch ($number){
            case '01': return "Janeiro";
                break;
            case '02': return "Fevereiro";
                break;
            case '03': return "Março";
                break;
            case '04': return "Abril";
                break;
            case '05': return "Maio";
                break;
            case '06': return "Junho";
                break;
            case '07': return "Julho";
                break;
            case '08': return "Agosto";
                break;
            case '09': return "Setembro";
                break;
            case '10': return "Outubro";
                break;
            case '11': return "Novembro";
                break;
            case '12': return "Dezembro";
                break;
            default: return false;
        }
    }


    /**
     * VERIFICA SE O USUÁRIO É SUPER ADMINISTRADOR
     * @return bool
     */
    function verifySuperAdm()
    {
        $response = false;

        if(Auth::user()->roles[0]->name === "super-adm"){
            $response = true;
        }

        return $response;
    }


    /**
     * FORMATA A DATA E HORA PARA O PADRÃO BRASILEIRO
     * @param date   $value (CAMPO DATE DA TABELA DO BANCO)
     * @param string $format
     * @return string
     */
    function formatDate($value, $format = 'd/m/Y H:i:s')
    {
        # UTILIZA A CLASSE DE CARBON PARA CONVERTER AO FORMATO DE DATA OU HORA DESEJADO
        return Carbon\Carbon::parse($value)->format($format);
    }

    function formatOnlyDate($value, $format = 'd/m/Y')
    {
        # UTILIZA A CLASSE DE CARBON PARA CONVERTER AO FORMATO DE DATA
        return Carbon\Carbon::parse($value)->format($format);
    }


    /**
     * FORMATA UM VALOR PARA O TIPO DE MOEDA, PADRÃO BRASILEIRO
     * @param string $value
     * @param string $currency
     * @param int    $decimals
     * @param string $dec_point
     * @param string $thousands_sep
     * @return string
     */
    function formatMoney($value, $currency = "R$", $decimals = 2, $dec_point = ',', $thousands_sep = '.')
    {
        # RETORNA O VALOR FORMATADO
        return "$currency " . number_format((float)$value, "$decimals", "$dec_point", "$thousands_sep");
    }


    /**
     * FORMADA O CNPJ E CPF COM A PONTUAÇÃO
     * @param $value
     * @return string|string[]|null
     */
    function formatCnpjCpf($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);

        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }


    /**
     * FORMATA O NÚMERO DE TELEFONE COM 8 OU 9 DÍGITOS COM O DDD
     * @param $value
     * @return string
     */
    function formatPhone($value)
    {
        $formatedPhone = preg_replace('/[^0-9]/', '', $value);
        $matches       = [];

        preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);

        if ($matches) {
            return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
        }

        return $value;
    }


    # REGISTRAR RASTRO DO USUÁRIO NO SISTEMA
    function userTrail($model, $method, $data = null)
    {
        /**
         *
        "O usuário: 'charles@stoledo.com.br', Acessou o módulo de Grupos"
        "O usuário: 'charles@stoledo.com.br', Gerou um relatório dos registros de Grupos"
        "O usuário: 'charles@stoledo.com.br', Criou o registro: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Enviou para lixeira o registro: '{data}' Grupos"
        "O usuário: 'charles@stoledo.com.br', Enviou para lixeira vários os registros: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Editou o registro: '{data_old}' com as informações: '{data_new}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Pesquisou sobre: '{data}' nos registros de Grupos"
        "O usuário: 'charles@stoledo.com.br', Visualizou os detalhes do registro: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Enviou para a lixeira todos os registros da tabela de Grupos"
        "O usuário: 'charles@stoledo.com.br', Efetuou o download do registro: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Acessou o a lixeira do módulo de Grupos"
        "O usuário: 'charles@stoledo.com.br', Editou o registro: '{data_old}' com as informações: '{data_new}' da lixeira de Grupos"
        "O usuário: 'charles@stoledo.com.br', Visualizou os detalhes do registro: '{data}' da lixeira de Grupos"
        "O usuário: 'charles@stoledo.com.br', Pesquisou sobre: '{data}' nos registros da lixeira de Grupos"
        "O usuário: 'charles@stoledo.com.br', Deletou o registro: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Deletou os registros: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Restaurou o registro: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Restaurou os registros: '{data}' de Grupos"
        "O usuário: 'charles@stoledo.com.br', Limpou todos os registros da tabela de Grupos"
         *
         **/

        # CRIA UMA INSTANCIA DO MODEL TRAIL
        $trailModel   = new Trail();

        # CRIA UMA INSTANCIA DO TRAILCONTROLLER
        $trail        = new TrailController($trailModel);

        # TRATAMENTO PARA CARACTERES ESPECIAIS
        $data         = json_decode("$data");

        # STRING PARA RECEBER OS DADOS
        $dataToString = '';

        # INSERE TODOS OS DADOS EM UMA STRING
        if(isset($data) && $data != null){
            foreach ($data as $key => $item){
                $dataToString .= "$key => $item;";
            }
        }

        switch ($method) {

            case 'index' : $trail->store($model, $method, $dataToString,
                                        "Acessou o módulo de $model.");
                break;

            case 'pdf' : $trail->store($model, $method, $dataToString,
                                        "Gerou relatório com os registros do módulo de $model.");
                break;

            case 'store' : $trail->store($model, $method, $dataToString,
                                        "Criou um registro do módulo de $model.");
                break;

            case 'storeAdd' : $trail->store($model, $method, $dataToString,
                                        "Criou um registro do módulo de $model.");
                break;

            case 'destroyWithAjaxFake' : $trail->store($model, $method, $dataToString,
                                                        "Enviou um registro do módulo de $model para a lixeira.");
                break;

            case 'destroyMultWithAjaxFake' : $trail->store($model, $method, $dataToString,
                                                            "Enviou alguns registros módulo de $model para a lixeira.");
                break;

            case 'update' : $trail->store($model, $method, $dataToString,
                                            "Editou um registro do módulo de $model.");
                break;

            case 'search' : $trail->store($model, $method, $dataToString,
                                            "Pesquisou um registro do módulo de $model.");
                break;

            case 'edit' : $trail->store($model, $method, $dataToString,
                                        "Visualizou os detalhes de um registro do módulo de $model.");
                break;

            case 'create' : $trail->store($model, $method, $dataToString,
                                        "Acessou formulário de cadastro de um registro do módulo de $model.");
                break;

            case 'clearTable' : $trail->store($model, $method, $dataToString,
                                                "Enviou todos os registros do módulo de $model para a lixeira.");
                break;

            case 'download' : $trail->store($model, $method, $dataToString,
                                            "Efetuou o download de registro do módulo de $model.");
                break;

            case 'trash' : $trail->store($model, $method, $dataToString,
                                        "Acessou a lixeira do módulo de $model.");
                break;

            case 'updateTrash' : $trail->store($model, $method, $dataToString,
                                                "Editou um registro da lixeira do módulo de $model.");
                break;

            case 'editTrash' : $trail->store($model, $method, $dataToString,
                                            "Visualizou os detalhes de um registro da lixeira do módulo de $model.");
                break;

            case 'searchTrash' : $trail->store($model, $method, $dataToString,
                                                "Pesquisou um de registro da lixeira do módulo de $model.");
                break;

            case 'destroyWithAjax' : $trail->store($model, $method, $dataToString,
                                                    "Deletou um registro do módulo de $model");
                break;

            case 'destroyMultWithAjax' : $trail->store($model, $method, $dataToString,
                                                        "Deletou alguns registros da lixeira do módulo de $model.");
                break;

            case 'restoreWithAjax' : $trail->store($model, $method, $dataToString,
                                                    "Restaurou um registro do módulo de $model.");
                break;

            case 'restoreMultWithAjax' : $trail->store($model, $method, $dataToString,
                                                        "Restaurou alguns registros da lixeira do módulo de $model.");
                break;

            case 'clearTableForce' : $trail->store($model, $method, $dataToString,
                                                    "Deletou todos os registros da lixeira do módulo de $model.");
                break;

            default : $trail->store($model, $method, $dataToString,
                                    "Método não rastreado!!!");

        }

    }

    function slugify($text)
    {
        // // replace non letter or digits by -
        // $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // // transliterate
        // $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // // remove unwanted characters
        // $text = preg_replace('~[^-\w]+~', '', $text);

        // // trim
        // $text = trim($text, '-');

        // // remove duplicate -
        // $text = preg_replace('~-+~', '-', $text);

        // // lowercase
        // $text = strtolower($text);

        // if (empty($text)) {
        // return 'n-a';
        // }

        // return $text;

        $slugify = new Slugify();
        return $slugify->slugify($text);
    }
