<?php

namespace App\Http\Controllers;
use App\Alerta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\AlertaRequest;

class AlertaController extends Controller
{
/*
    public function search1(Request $req)
    {
        //$sujetoCredito = SujetoCredito::where('id', $req->id)->first();
        $sujetoCredito = SujetoCredito::with('sucursal')->find($req->id);
        return response()->json($sujetoCredito);
    }
*/
    public function index()
    {
        $alertas = Alerta::all();
        return view('alertas.index', ['alertas' => $alertas]);
    }

    public function create()
    {
        return view('alertas.create');
    }

    public function store(AlertaRequest $alertaRequest)
    {
        $data = $alertaRequest->all();
        if(Alerta::create($data))
        {
            Session::flash('message-success', 'Alerta creada Satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear la Alerta');
        }
        return redirect()->route('alerta.index');
    }

    public function show(Alerta $alerta)
    {
        return view('alertas.show', compact('alerta'));
     }

    public function edit(Alerta $alerta)
    {
        return view('alertas.edit', ['alerta' => $alerta]);
     }


    public function update(alertaRequest $alertaRequest, Alerta $alerta)
    {
        $data = $alertaRequest->all();
        if($alerta->fill($data)->update())
        {
            Session::flash('message-success', 'Alerta actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar la Alerta');
        }
        return redirect()->route('alerta.index');
    }

    public function destroy(AlertaRequest $alertaRequest)
    {
        $alerta = Alerta::findOrFail($alertarequest->id);
        if($alerta->delete())
        {
            Session::flash('message-success', 'Alerta eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Alerta');
        }
        return redirect()->route('alerta.index');
    }

}
