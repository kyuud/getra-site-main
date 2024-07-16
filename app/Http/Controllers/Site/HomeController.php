<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Site\ContactFormRequest;
    use App\Mail\EmailContact;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\URL;

    class HomeController extends Controller
    {
    protected $banners, $services, $portfolios, $teams,
            $funfacts, $companies, $blogs;

    public function __construct(BannerController $banner, ServiceController $service,
                                FunfactController $funfact, PortfolioController $portfolio,
                                TeamController $team, CompanyController $company, BlogController $blog)
    {
        $this->banners = $banner;
        $this->services = $service;
        $this->funfacts = $funfact;
        $this->portfolios = $portfolio;
        $this->teams = $team;
        $this->companies = $company;
        $this->blogs = $blog;
    }

    public function index()
    {
        $banners = $this->banners->getAll();
        $services = $this->services->getAll();
        $funfacts = $this->funfacts->getAll();
        $portfolios = $this->portfolios->getAll();
        $teams = $this->teams->getAll();
        $companies = $this->companies->getAll();
        $blogs = $this->blogs->getAll();

        return view('Site.home.index', compact('banners', 'services', 'portfolios', 'teams', 'funfacts', 'companies', 'blogs'));
    }

    public function sendMail(ContactFormRequest $request)
    {
        $details = $request->all();
        Mail::to('crishenrique@stoledo.com.br')->send(new EmailContact($details));

        return redirect()->to(URL::previous().'#contato')->withSuccess("Email enviado com sucesso!!!");


    }

}
