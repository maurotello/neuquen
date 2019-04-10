<?php

namespace App\Http\Controllers;
use App\User;
use App\Proyecto;
use App\Refinanciacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RefinanciacionRequest;

class RefinanciacionController extends Controller
{
    public function index()
    {
        //$proyectos        = Proyecto::all();
        $refinanciaciones = Refinanciacion::all();
        return view('refinanciaciones.index',
          [
            'refinanciaciones'     => $refinanciaciones
          ]);
    }

    
    public function create()
    {
        $proyectos      = Proyecto::all()->pluck('nombre', 'id');
        return view('refinanciaciones.create', compact('proyectos'));
    }

    public function create1($idProyecto)
    {
        $proyectos = Proyecto::find($idProyecto);
        
        if (!(Refinanciacion::evaluarRefinanciacion($proyectos)))
        {
            Session::flash('message-danger', 'El proyecto no puede ser Refinanciado, Verifique');
            return back();
        }

        return view('refinanciaciones.create1', compact('proyectos'));
    }


     public function store(Request $request)
     {
        $data = $request->all();
        $data['fecha'] = \Carbon\Carbon::parse($data['fecha'])->format('Y-m-d');
        $data['user_id'] = Auth::user()->id;
        if(Refinanciacion::create($data))
        {
            Session::flash('message-success', 'Refinanciación creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Refinanciacion');
        }
        return redirect()->route('refinanciacion.index');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(refinanciacion $refinanciacion)
     {
         //return view('bancos.show', compact('banco'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Refinanciacion $refinanciacion)
     {
        $proyectos      = Proyecto::all()->pluck('nombre', 'id');
        return view('refinanciaciones.edit', 
            [
                'proyectos'         => $proyectos,
                'refinanciacion'    => $refinanciacion
            ]
        );
     }


     public function update(Request $request, Refinanciacion $refinanciacion)
     {
        //$refinanciacion = Refinanciacion::findOrFail($request->id);
        $data = $request->all();
        $data['fecha'] = \Carbon\Carbon::parse($data['fecha'])->format('Y-m-d');
        if($refinanciacion->fill($data)->update())
        {
            Session::flash('message-success', 'Refinanciación actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Refinanciacion');
        }
        return redirect()->route('refinanciacion.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
    {
        $refinanciacion = Refinanciacion::findOrFail($request->id);
        if($refinanciacion->delete())
        {
            Session::flash('message-success', 'Refinanciación eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Refinanciacion');
        }
        return back();
    }

}
