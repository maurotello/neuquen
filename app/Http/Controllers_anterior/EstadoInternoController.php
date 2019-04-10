<?php

namespace App\Http\Controllers;
use App\EstadoInterno;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoInternoRequest;

class EstadoInternoController extends Controller
{

    protected $estadointerno;

    public function __construct()
    {
        $this->middleware('permission:estadoInterno.index')->only('index');
        $this->middleware('permission:estadoInterno.create')->only(['create', 'store']);
        $this->middleware('permission:estadoInterno.edit')->only(['edit', 'update']);
        $this->middleware('permission:estadoInterno.show')->only('show');
        $this->middleware('permission:estadoInterno.destroy')->only('destroy');
        $this->estadoInterno = $this->getEstadoInterno();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $estadosInternos = EstadoInterno::all();
       return view('estadointerno.index',compact('estadosInternos'));
         //return view('bancos.index', ['banco' => $this->banco]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  return view('estadointerno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //EstadoInterno::create($estadointernoRequest->all());
        //return redirect()->route('estadointerno.index')->with('message', 'EstadoInterno ingresado.');
        if(EstadoInterno::create($request->all()))
        {
            Session::flash('message-success', 'Estado Interno creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Estado Interno');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(estadointerno $estadointerno)
     {
        // return view('estadointerno.show', compact('estadointerno'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(estadointerno $estadointerno)
     {
        //  return view('estadointernos.edit', ['estadointerno' => $estadointerno]);
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
         //$estadointerno->fill($estadointernoRequest->all())->update();
         //Session::flash('message', 'Estado Interno actualizado satisfactoriamente.');
         //return redirect()->route('estadointerno.index');
        $estadoInterno = EstadoInterno::findOrFail($request->id);
        if($estadoInterno->update($request->all()))
        {
            Session::flash('message-success', 'Estado Interno actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Estado Interno');
        }
        return back();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /*
     public function destroy(estadointerno $estadointerno)
     {
         EstadoInterno::where('slug' , $slug)->delete();
         $this->estadointerno = $this->getEstadoInterno();
         Session::flash('message-danger', 'Estado Interno eliminado satisfactoriamente.');
         return redirect()->route('estadointerno.index');
     }
     */
     public function destroy(Request $request)
     {
         $estadoInterno = EstadoInterno::findOrFail($request->id);
        if($estadoInterno->delete())
        {
            Session::flash('message-success', 'Estado Interno eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Estado Interno');
        }
        return back();
     }
     private function getEstadoInterno()
    {
        return EstadoInterno::all();
    }
}
