<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactFormRequest;
use App\Http\Requests\Site\WorkFormRequest;
use App\Mail\EmailContact;
use App\Mail\WorkContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ContactController extends StandardController
{
    protected $blogs, $companies;

    protected $upload = [
        'name' => 'file',
        'path' =>  'attachs'
    ];


    public function __construct(BlogController $blog, CompanyController $company)
    {
        $this->blogs = $blog;
        $this->companies = $company;
    }

    public function index()
    {
        $companies = $this->companies->getAll();

        return view('Site.contacts.index', compact('companies'));
    }

    public function sendMail(ContactFormRequest $request)
    {
        $details = $request->all();
        Mail::to('getra@getra.com.br')->send(new EmailContact($details));

        return redirect()->to(URL::previous().'#contato')->withSuccess("Email enviado com sucesso!!!");
    }

}
