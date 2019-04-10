<?php

namespace App\Http\Controllers;
use App\User;
use App\Proyecto;
use App\AnexoProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SujetoCreditoRequest;
use Redirect;

class AnexoProyectoController extends Controller
{


    
    public function index()
    {
        $proyectos = Proyecto::all();
        $anexos    = AnexoProyecto::all();
        return view('anexosproyectos.index', [
            'anexos' => $anexos
        ]);
    }

     public function create()
     {
         $proyectos = Proyecto::all()->pluck('nombre', 'id');
         return view('anexosproyectos.create', [
             'proyectos'  => $proyectos
         ]);
     }

    
    public function store(AnexoProyectoRequest $anexoProyectoRequest)
    {
        $data = $anexoProyectoRequest->all();
        $data['user_id'] = Auth::user()->id;
        if ($anexoProyectoRequest->hasfile('file'))
        {
             foreach ($anexoProyectoRequest->file('file') as $key => $value)
             {
                 $imageName = $value->getClientOriginalName();
                 $value->move(public_path('upload/proyectos/' . $data->proyecto->nombre . '/'), $imageName);
                 $data['file'] = "upload/proyectos/" . $data->proyecto->nombre . "/" . $imageName;
             }

        }
        if (AnexoProyecto::create($data))
        {
            Session::flash('message-success', 'Anexo Proyecto creado satisfactoriamente.');
        
        }else{
            Session::flash('message-danger', 'Error al intentar guardar el Anexo');
        }
        return redirect()->route('anexoProyecto.index');
    }


     public function show(refinanciacion $refinanciacion)
     {
         //return view('bancos.show', compact('banco'));
     }

 
     public function edit(AnexoProyecto $anexoProyecto)
     {
          return view('anexoProyecto.edit', ['anexoProyecto' => $anexoProyecto]);
     }

   
     public function update(AnexoProyectoRequest $anexoProyectoRequest, AnexoProyecto $anexoProyecto)
     {
        if($proyecto->fill($anexoProyectoRequest->all())->update())
        {
            if ($anexoProyectoRequest->hasfile('filename'))
            {
                foreach ($anexoProyectoRequest->file('filename') as $key => $value)
                {
                    $imageName = $value->getClientOriginalName();
                    $value->move(public_path('upload/proyectos/' . $data->proyecto->nombre . '/'), $imageName);
                    $data['file'] = "upload/proyectos/" . $data->proyecto->nombre . "/" . $imageName;
                }

            }
            Session::flash('message-success', 'Anexo Proyecto actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar el Anexo');
        }


        return redirect()->route('anexoProyecto.index');
    }

    public function deletefile($slug)
    {

        $archivo = AnexoProyecto::where('slug', $slug)->first();

       // dd(asset("$archivo->file"));
        if(\File::exists(asset("$archivo->file")))
        {
            //public_path
            if (\File::delete(asset("$archivo->file")))
            {
                if( $borrar_registro = DB::table('anexos_proyectos')->where('slug', '=', $slug)->delete())
                {
                        return back()->withSuccess('Archivo Borrado Correctamente!');
                        //Session::flash('message', 'Archivo Borrado Correctamente');
                }else{
                    Session::flash('message-danger', 'Se eliminó el archivo del disco pero hubo un inconveniente en borrar el registro correspondiente');
                }
            }else{
              Session::flash('message-danger', 'Ocurrió un error al intentar eliminar el archivo');
            }
        }else{
            return back()->with('message-danger', 'El archivo no Existe en el Disco');
        }
    }


    public function destroy(AnexoProyecto $AnexoProyecto)
    {
        if (AnexoProyecto::where('slug' , $AnexoProyecto->slug)->delete())
        {
            Session::flash('message-success', 'Anexo Eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar el Anexo');
        }
        return redirect()->route('anexoProyecto.index');
    }

}
