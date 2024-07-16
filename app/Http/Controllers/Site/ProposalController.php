<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ProposalRequest;
use App\Mail\ProposalContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ProposalController extends Controller
{
    public function index() {
        return view('Site.proposal.index');
    }


    public function sendProposal(ProposalRequest $request)
    {
        $details = $request->all();
        Mail::to('comercial@getra.com.br')->send(new ProposalContact($details));

        return redirect()->to(URL::previous() . '#proposal')->withSuccess("Proposta enviada com sucesso!!!");
    }
}
