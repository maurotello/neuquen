<?php

namespace App\Http\Controllers;
use App\User;
use App\Proyecto;
use App\Titular;
use App\EstadoCivil;
use App\Localidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TitularRequest;

class TitularController extends Controller
{
    public function index()
    {
        $titulares = Titular::all();
        return view('titulares.index',
          [
            'titulares'     => $titulares
          ]);
    }

    
    public function create()
    {
        $localidades = Localidad::all()->pluck('nombre', 'id');
        $estadosCiviles  = EstadoCivil::all()->pluck('nombre', 'id');
        $proyectos   = Proyecto::all()->pluck('nombre', 'id');
        return view('titulares.create', [
            'localidades'    => $localidades,
            'estadosCiviles' => $estadosCiviles,
            'proyectos'      => $proyectos,
            'estado'         => 'create'
        ]);
    }

    public function create1($idProyecto)
    {
        $localidades = Localidad::all()->pluck('nombre', 'id');
        $estadosCiviles  = EstadoCivil::all()->pluck('nombre', 'id');
        $proyectos = Proyecto::find($idProyecto);

        return view('titulares.create1', [
            'localidades'    => $localidades,
            'estadosCiviles' => $estadosCiviles,
            'proyectos'      => $proyectos,
            'estado'         => 'create1'
        ]);
    }


    public function store1(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

       

        if ($data['fecha_nacimiento'])
        {
            $data['fecha_nacimiento'] = Carbon::parse($data['fecha_nacimiento'])->format('Y-m-d');
        }

        if ($data['fecha_nacimiento_conyuge'])
        {
            $data['fecha_nacimiento_conyuge'] = Carbon::parse($data['fecha_nacimiento_conyuge'])->format('Y-m-d');
        }

        

        if(Titular::create($data))
        {
            Session::flash('message-success', 'Titular creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Titular');
        }
        
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($data['fecha_nacimiento'])
        {
            $data['fecha_nacimiento'] = Carbon::parse($data['fecha_nacimiento'])->format('Y-m-d');
        }

        if ($data['fecha_nacimiento_conyuge'])
        {
            $data['fecha_nacimiento_conyuge'] = Carbon::parse($data['fecha_nacimiento_conyuge'])->format('Y-m-d');
        }

      //  dd($data);

        if(Titular::create($data))
        {
            if ($data['estado'] == 'create1')
            {
                $proyecto = Proyecto::where('id', $data['proyecto_id'])->first();
                return redirect()->route('proyecto.edit', $proyecto);
            }else{
                return redirect()->route('titular.index');
            }
            Session::flash('message-success', 'Titular creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Titular');
        }
        
        
    }

    
     public function show(Titular $titular)
     {
         return view('titulares.show', compact('titular'));
     }


     public function edit(Titular $titular)
     {
        $localidades = Localidad::all()->pluck('nombre', 'id');
        $estadosCiviles  = EstadoCivil::all()->pluck('nombre', 'id');
        $proyectos   = Proyecto::all()->pluck('nombre', 'id');
        
        return view('titulares.edit', [
            'localidades'    => $localidades,
            'estadosCiviles' => $estadosCiviles,
            'proyectos'      => $proyectos,
            'titular'        => $titular
        ]);
     }


     public function update(TitularRequest $request, Titular $titular)
     {
       
        $data = $request->all();
        //dd($data);
        if($titular->fill($data)->update())
        {
            Session::flash('message-success', 'Titular actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Titular');
        }
        return redirect()->route('titular.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    function removedata(Request $request)
    {
        $titular = Titular::find($request->input('id'));
        if($titular->delete())
        {
            Session::flash('message-success', 'Titular eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Titular');
        }
        return back();
    }


    public function destroy(TitularRequest $request)
    {
        $titular = Titular::findOrFail($request->id);
        if($titular->delete())
        {
            Session::flash('message-success', 'Titular eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Titular');
        }
        return back();
    }

}
