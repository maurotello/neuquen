<?php

namespace App\Http\Controllers;
use App\LineaCredito;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LineaCreditoRequest;

class LineaCreditoController extends Controller
{

    protected $lineacredito;

    public function __construct()
    {
        $this->lineacredito = $this->getLineaCredito();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $lineacreditos = LineaCredito::all();
       return view('lineacreditos.index',compact('lineacreditos'));
    }

   
    public function create()
    {
        return view('lineacreditos.create');
    }

    
    public function store(LineaCreditoRequest $lineacreditoRequest)
    {
        $data = $lineacreditoRequest->all();
        $data['user_id'] = Auth::user()->id;
        if(LineaCredito::create($data))
        {
            Session::flash('message-success', 'Línea de Crédito creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Línea de Crédito');
        }
        return redirect()->route('lineacredito.index')->with('message', 'Linea de Credito ingresada.');
    }

    
    public function show(lineacredito $lineacredito)
    {
        return view('lineacredito.show', compact('lineacredito'));
    }

    
    public function edit(lineacredito $lineacredito)
    {
        return view('lineacreditos.edit', ['lineacredito' => $lineacredito]);
    }

    
    public function update(LineaCreditoRequest $lineacreditoRequest, lineacredito $lineacredito)
    {
       
        if($lineacredito->fill($lineacreditoRequest->all())->update())
        {
            Session::flash('message-success', 'Línea de Crédito actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Línea de Crédito');
        }

        return redirect()->route('lineacredito.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



     public function destroy(lineacredito $lineacredito)
     {
        if(LineaCredito::where('slug' , $slug)->delete())
        {
            Session::flash('message-success', 'Línea de Crédito eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Línea de Crédito');
        }
        $this->lineacredito = $this->getLineaCredito();
        return redirect()->route('lineacredito.index');
     }

     private function getLineaCredito()
    {
        return LineaCredito::all();
    }
}
