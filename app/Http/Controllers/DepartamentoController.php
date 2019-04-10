<?php

namespace App\Http\Controllers;
use App\Departamento;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoRequest;

class DepartamentoController extends Controller
{

    protected $departamento;

    public function __construct()
    {
        $this->middleware('permission:departamento.index')->only('index');
        $this->middleware('permission:departamento.create')->only(['create', 'store']);
        $this->middleware('permission:departamento.edit')->only(['edit', 'update']);
        $this->middleware('permission:departamento.show')->only('show');
        $this->middleware('permission:departamento.destroy')->only('destroy');
        $this->departamento = $this->getDepartamento();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $departamentos = Departamento::all();
         return view('departamentos.index',compact('departamentos'));
     }
     /*
    public function index()
    {
        return view('departamentos.index', ['departamento' => $this->departamento]);
    }
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        if(Departamento::create($request->all()))
        {
            Session::flash('message-success', 'Departamento creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Departamento');
        }
        return back();
     }
     /*
    public function store(DepartamentoRequest $departamentoRequest)
    {
        Departamento::create($departamentoRequest->all());
        return redirect()->route('departamento.index')->with('message', 'Departamento ingresada.');
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(departamento $departamento)
     {
         //return view('departamentos.show', compact('departamento'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(departamento $departamento)
     {
        //  return view('departamentos.edit', ['departamento' => $departamento]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
     {

        $departamento = Departamento::findOrFail($request->id);
        if($departamento->update($request->all()))
        {
            Session::flash('message-success', 'Departamento actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Departamento');
        }
        return back();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
        $departamento = Departamento::findOrFail($request->id);
        if($departamento->delete())
        {
            Session::flash('message-success', 'Departamento eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Departamento');
        }
        return back();
     }

     private function getDepartamento()
    {
        return Departamento::all();
    }
}
