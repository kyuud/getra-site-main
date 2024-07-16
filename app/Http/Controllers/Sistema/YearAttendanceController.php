<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sistema\YearFormRequest;
use App\Models\Sistema\YearAttendance;
use Illuminate\Http\Request;

class YearAttendanceController extends Controller
{

    protected $month;

    protected $model;
    protected $title = "Atendimento";
    protected $view = "Sistema.attendance.attendance-year";
    protected $route = "attendance";
    protected $name        = ["single" => "atendimento", "plus" => "atendimentos"];

    public function __construct(YearAttendance $yearAttendance)
    {
        $this->model  = $yearAttendance;
    }

    public function getAll()
    {
        $results = $this->model->where('deleted_at', null)
            ->where('status', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return $results;
    }

    public function index()
    {
        # TÍTULO DA PÁGINA
        $title = $this->title;

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        $model = $this->model
            ->where("deleted_at", '=', null)
            ->orderBy('id', 'asc')
            ->paginate(12);

        # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
        return view($this->view . ".index",
            compact("title", "route", "active", "model"));
    }

    public function create() {

        # TITLE DA PÁGINA
        $title = "Cadastrar {$this->title}";

        # MENU ATIVO
        $active = $this->route;

        # NOME DA ROTA
        $route = $this->route;

        $model = $this->model
            ->where("deleted_at", '=', null)
            ->orderBy('id', 'asc')
            ->paginate(12);

        return view("{$this->view}.create-edit", compact("title", "route", "active", "model"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdd(YearFormRequest $request)
    {
        $dataForm = $request->all();

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;


        if ($this->upload && $request->hasFile($this->upload['name'])) {

            $image = $request->file($this->upload['name']);

            $nameFile = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();

            $upload = $image->storeAs($this->upload['path'], $nameFile);

            if ($upload) {
                $dataForm[$this->upload['name']] = $nameFile;
            } else {
                return redirect()
                    ->route("{$this->route}.create")
                    ->withErrors(['errors' => 'Erro no Upload!'])
                    ->withInput();
            }

        }

        $insert = $this->model->create($dataForm);

        if ($insert)
            return redirect()
                ->route("{$this->route}.create")
                ->with(['success' => 'Cadastro realizado com sucesso!']);
        else
            return redirect()->route("{$this->route}.create")
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
    }

}
