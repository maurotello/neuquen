<?php

namespace App\Http\Controllers;
use App\EstadoCivil;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoCivilRequest;
use Illuminate\Support\Facades\Session;

class EstadoCivilController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:estadoCivil.index')->only('index');
        $this->middleware('permission:estadoCivil.create')->only(['create', 'store']);
        $this->middleware('permission:estadoCivil.edit')->only(['edit', 'update']);
        $this->middleware('permission:estadoCivil.show')->only('show');
        $this->middleware('permission:estadoCivil.destroy')->only('destroy');
       // $this->estadocivil = $this->getEstadoCivil();
    }
    public function index()
    {
      $estadoCivil = EstadoCivil::all();
      return view('estadocivil.index',compact('estadoCivil'));
        //return view('bancos.index', ['banco' => $this->banco]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('bancos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        if(EstadoCivil::create($request->all()))
        {
            Session::flash('message-success', 'Estado Civil creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Estado Civil');
        }
        return back();
     }


     public function show(estadocivil $estadocivil)
     {
         //return view('bancos.show', compact('banco'));
     }

     public function edit(estadoCivil $estadoCivil)
     {
        //  return view('bancos.edit', ['banco' => $banco]);
     }


     public function update(Request $request)
     {
        $estadoCivil = EstadoCivil::findOrFail($request->id);
        if($estadoCivil->update($request->all()))
        {
            Session::flash('message-success', 'Estado Civil actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Estado Civil');
        }
        return back();
     }

     public function destroy(Request $request)
    {
        $estadoCivil = EstadoCivil::findOrFail($request->id);
        if($estadoCivil->delete())
        {
            Session::flash('message-success', 'Estado Civil eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Estado Civil');
        }
        return back();
    }

}
