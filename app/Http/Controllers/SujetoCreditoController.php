<?php

namespace App\Http\Controllers;
use App\SujetoCredito;
use App\Proyecto;
use App\Sucursal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\SujetoCreditoRequest;

class SujetoCreditoController extends Controller
{

    public function search1(Request $req)
    {
        //$sujetoCredito = SujetoCredito::where('id', $req->id)->first();
        $sujetoCredito = SujetoCredito::with('sucursal')->find($req->id);
        return response()->json($sujetoCredito);
    }

    public function index()
    {
        $sucursales = Sucursal::all()->pluck('nombre', 'id');
        $proyectos = Proyecto::all()->pluck('nombre', 'id');
        $sujetoCreditos = SujetoCredito::all();
        return view('sujetocreditos.index',
        [
            'sujetoCreditos' => $sujetoCreditos,
            'proyectos'     => $proyectos,
            'sucursales'    => $sucursales
        ]);
        //return view('bancos.index', ['banco' => $this->banco]);
    }

    public function create()
    {
        $sucursales = Sucursal::all()->pluck('nombre', 'id');
        $proyectos = Proyecto::all()->pluck('nombre', 'id');
        return view('sujetocreditos.create', [
            'sucursales'    => $sucursales,
            'proyectos'     =>$proyectos
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->all();
        
        if ($data['sujeto_credito'])
        {
            if ($data['sujeto_credito'] == 'SI')
            {
                $data['sujeto_credito'] == 'SI';
            }else{
                $data['sujeto_credito'] == 'NO';
            }
        }
        $data['fecha_envio_banco'] = Carbon::parse($data['fecha_envio_banco'])->format('Y-m-d');
        if ($data['fecha_respuesta_banco'])
        {
            $data['fecha_respuesta_banco'] = Carbon::parse($data['fecha_respuesta_banco'])->format('Y-m-d');
        }
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = $data['proyecto_id'] . "-" . $data['sucursal_id'] . "-" . rand(1,1000);

        if(SujetoCredito::create($data))
        {
            $proyecto = Proyecto::find($data['proyecto_id']);
            $proyecto->fechaRespuestaBanco = $data['fecha_respuesta_banco'];
            $proyecto->fechaEnvioBanco = $data['fecha_envio_banco'];
            $proyecto->save();
            return back()->with('message-success','Sujeto de Crédito cargado correctamente');
        }else{
            return back()->with('message-danger','Error al intentar guardar el Suejto de crédito');
        }

     }

    public function show(sujetoCredito $sujetoCredito)
    {
         //return view('bancos.show', compact('banco'));
     }

    public function edit(sujetoCredito $sujetoCredito)
    {
        $sucursales = Sucursal::all()->pluck('nombre', 'id');
        $proyectos = Proyecto::all()->pluck('nombre', 'id');
        return view('sujetocreditos.edit', [
            'sujetoCreditos' => $sujetoCredito,
            'sucursales'    => $sucursales,
            'proyectos'     =>$proyectos
        ]);
     } 
    public function updateAjax(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'fecha_envio_banco'     => 'date|required',
            'fecha_respuesta_banco' => 'date|nullable'
        ]);
 
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $id                      = (int) $req->idSujetoAjax;
        $fecha_envio_banco       = $req->fecha_envio_banco;
        $fecha_respuesta_banco   = $req->fecha_respuesta_banco;
        $sujeto_credito          = $req->sujeto_credito;
        $sucursal                = $req->sucursal;
        $descripcion             = $req->descripcion;
        
        $sujeto = SujetoCredito::find($id);
        
        $sujeto->fecha_envio_banco = \Carbon\Carbon::parse($fecha_envio_banco)->format('Y-m-d');

        if ($req->fecha_respuesta_banco)
            $sujeto->fecha_respuesta_banco = \Carbon\Carbon::parse($req->fecha_respuesta_banco)->format('Y-m-d');


        if ($sujeto_credito)
        {
            if ($sujeto_credito == "SI")
            {
                $sujeto->sujeto_credito = 'SI';
            }else{
                $sujeto->sujeto_credito = 'NO';
            }
        }
        //dd($sujeto->sujeto_credito);

        if ($req->sujeto_credito)
            $sujeto->descripcion = htmlentities($descripcion);
      //  dd($sujeto);
        if ($sujeto->save())
        {
            Session::flash('message-success', 'Sujeto de Crédito actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Sujeto de Crédito');
        }
        return back();
    }

    public function update(Request $request, SujetoCredito $sujetoCredito)
    {
        $data = $request->all();
        $data['fecha_envio_banco'] = Carbon::parse($data['fecha_envio_banco'])->format('Y-m-d');
        if ($data['fecha_respuesta_banco'])
        {
            $data['fecha_respuesta_banco'] = Carbon::parse($data['fecha_respuesta_banco'])->format('Y-m-d');
        }
        if ($data['sujeto_credito'])
        {
            if ($data['sujeto_credito'] == 'SI')
            {
                $data['sujeto_credito'] == 'SI';
            }else{
                $data['sujeto_credito'] == 'NO';
            }
        }

        if($sujetoCredito->fill($data)->update())
        {
            Session::flash('message-success', 'Sujeto de Crédito actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Sujeto de Crédito');
        }
        return redirect()->route('sujetoCredito.index');
     }

    public function search(Request $req)
    {
        $sujeto = SujetoCredito::where('id', $req->id)->first();
        return response()->json($sujeto);
    }


    function removedata(Request $request)
    {
        $sujeto = SujetoCredito::find($request->input('id'));
        if($sujeto->delete())
        {
            Session::flash('message-success', 'Sujeto de Crédito eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Sujeto de Crédito');
        }
        return back();
    }



    public function destroy(Request $request)
    {
        $sujetoCredito = SujetoCredito::findOrFail($request->id);
        if($sujetoCredito->delete())
        {
            Session::flash('message-success', 'Sujeto de Crédito eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Sujeto de Crédito');
        }
        return redirect()->route('sujetoCredito.index');
    }

}
