<?php

namespace App\Http\Controllers;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EstadoRequest;

class EstadoController extends Controller
{

    protected $estado;

    public function __construct()
    {
        $this->middleware('permission:estado.index')->only('index');
        $this->middleware('permission:estado.create')->only(['create', 'store']);
        $this->middleware('permission:estado.edit')->only(['edit', 'update']);
        $this->middleware('permission:estado.show')->only('show');
        $this->middleware('permission:estado.destroy')->only('destroy');
        $this->estado = $this->getEstado();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $estados = Estado::all();
      return view('estados.index',compact('estados'));
        //return view('estados.index', ['estado' => $this->estado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        if(Estado::create($request->all()))
        {
            Session::flash('message-success', 'Estado creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Estado');
        }
        return back();
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(estado $estado)
     {
         //return view('estados.show', compact('estado'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(estado $estado)
     {
        //  return view('estados.edit', ['estado' => $estado]);
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
        $estado = Estado::findOrFail($request->id);
        if($estado->update($request->all()))
        {
            Session::flash('message-success', 'Estado actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Estado');
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
        $estado = Estado::findOrFail($request->id);
        if($estado->delete())
        {
            Session::flash('message-success', 'Estado eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Estado');
        }
        return back();
    }
     private function getEstado()
    {
        return Estado::all();
    }
}
