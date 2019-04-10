<?php

namespace App\Http\Controllers;
use App\DestinoCredito;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\DestinoCreditoRequest;

class DestinoCreditoController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:destinoCredito.index')->only('index');
        $this->middleware('permission:destinoCredito.create')->only(['create', 'store']);
        $this->middleware('permission:destinoCredito.edit')->only(['edit', 'update']);
        $this->middleware('permission:destinoCredito.show')->only('show');
        $this->middleware('permission:destinoCredito.destroy')->only('destroy');
        
    }

    public function index()
    {
      $destinoCredito = DestinoCredito::all();
      return view('destinocreditos.index',compact('destinoCredito'));
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
        if(DestinoCredito::create($request->all()))
        {
            Session::flash('message-success', 'Destino del Crédito creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear el Destino del Crédito');
        }
         return back();
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(destinocredito $destinocredito)
     {
         //return view('bancos.show', compact('banco'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(destinoCredito $destinoCredito)
     {
        //  return view('bancos.edit', ['banco' => $banco]);
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
        $destinoCredito = DestinoCredito::findOrFail($request->id);
        if($destinoCredito->update($request->all()))
        {
            Session::flash('message-success', 'Destino del Crédito actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar el Destino del Crédito');
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
        $destinoCredito = DestinoCredito::findOrFail($request->id);
        if($destinoCredito->delete())
        {
            Session::flash('message-success', 'Destino del Crédito eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar el Destino del Crédito');
        }
        return back();
    }

}
