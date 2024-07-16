<?php
namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Models\Sistema\ExamsList;
use App\Models\Sistema\Supplier;
use Carbon\Carbon; // Classe para manipulação de datas
use PDF;

class ExamListController extends StandardController
{
    protected $model;
    protected $title = "Exames";
    protected $view = "Sistema.exam_list";
    protected $route = "exam_list";
    protected $permissions = "exams";
    protected $name = ["single" => "Exame", "plus" => "Exames"];
    protected $totalPage = 20;


    public function index(Request $request)
    {
        $title = "{$this->title}";
        $route = $this->route;
        $active = $route;
        $name = $this->name;
        $supplier = Supplier::all();
        $data = ExamsList::with('supplier')->orderBy('id', 'asc')->paginate($this->totalPage);

        return view("{$this->view}.index", compact("name", "title", "route", "active", "data", "supplier"));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'supplier_id' => 'required',
            'value_amount' => 'required',
            'value_fee' => 'required',
        ]);

        ExamsList::create($request->all());

        return redirect()->route("{$this->route}.index")->with('success', 'Exame cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $exam = ExamsList::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'supplier_id' => 'required',
            'value_amount' => 'required',
            'value_fee' => 'required',
        ]);

        $exam->update($request->all());

        return redirect()->route("{$this->route}.index")->with('success', 'Exame atualizado com sucesso!');
    }

    public function trash()
    {
        $trashedExams = ExamsList::onlyTrashed()->paginate($this->totalPage);
        return view("{$this->view}.trash", compact('trashedExams'));
    }

    public function destroyWithAjax(Request $request)
    {
        $exam = ExamsList::findOrFail($request->id);
        $exam->delete();  // Ou $exam->forceDelete(); para remoção permanente
        return response()->json(['success' => 'Exame excluído com sucesso.']);
    }

    public function restoreWithAjax(Request $request)
    {
        $exam = ExamsList::withTrashed()->findOrFail($request->id);
        $exam->restore();
        return response()->json(['success' => 'Exame restaurado com sucesso.']);
    }
}
