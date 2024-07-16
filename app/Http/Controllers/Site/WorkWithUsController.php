<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\WorkFormRequest;
use App\Mail\WorkContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class WorkWithUsController extends StandardController
{

    protected $companies;
    protected $upload = [
        'name' => 'file',
        'path' => 'attachs'
    ];

    public function __construct(CompanyController $company)
    {
        $this->companies = $company;
    }

    public function index()
    {

        $companies = $this->companies->getAll();

        return view('Site.contacts.work-with-us', compact('companies'));
    }

    public function workMail(WorkFormRequest $request)
    {
        # RECEBE OS DADOS DO FORMULÁRIO
        $details = $request->all();

        # FUNCÇÃO QUE RECEBE O ANEXO DO FORM
        $attach = $this->upload_attach();

        #ENVIA O EMAIL
        Mail::to('getra@getra.com.br')->send(new WorkContactMail($details, $attach));

        return redirect()->to(URL::previous() . '#contato')->withSuccess("Currículo enviado com sucesso!!!");
    }

    /**
     * function attach_upload()
     *
     * @return void
     */
    public function upload_attach()
    {
        #SE EXIXTIR INPUT FILE COM ESSE NAME
        if (isset($_FILES["file"])) {

            #DEFINE O PATH ONDE O ARQUIVO SERÁ GRAVADO
            $path = "./attachs/";

            #VERIFICA SE EXISTE
            #SE NÃO EXISTIR CRIAMOS COM PERMISSÃO DE LEITURA E ESCRITA
            if (!is_dir($path)) {
                mkdir($path, 0775, $recursive = true);
            }
            #PEGA A EXTENÇÃO DA IMAGEM
            $extension = explode('.', $_FILES['file']['name']);

            #VERIFICA A EXTENÇÃO
            if ($extension[1] == "pdf" || $extension[1] == "doc" || $extension[1] == "docx") {

                #CRIA UM NOVE NOME PARA A IMAGEM
                $new_name = uniqid(md5(substr($_FILES['file']['name'], 0, 5))) . '.' . $extension[1];
                #DESTINO DA IMAGEM
                $destination = $path . $new_name;
                #SETA O DESTINO DA IMAGEM
                move_uploaded_file($_FILES['file']['tmp_name'], $destination);
                #RETORNA O NOVO NOME DA IMAGEM
                return $path . $new_name;
            } else {
                return 'Arquivo inválido!!';
            }
        }
    }
}
