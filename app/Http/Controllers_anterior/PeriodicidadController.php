<?php

namespace App\Http\Controllers;
use App\Periodicidad;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\PeriodicidadRequest;

class PeriodicidadController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:periodicidad.index')->only('index');
        $this->middleware('permission:periodicidad.create')->only(['create', 'store']);
        $this->middleware('permission:periodicidad.edit')->only(['edit', 'update']);
        $this->middleware('permission:periodicidad.show')->only('show');
        $this->middleware('permission:periodicidad.destroy')->only('destroy');
        
    }

    public function index()
    {
        $periodicidad = Periodicidad::all();
        return view('periodicidad.index',compact('periodicidad'));
    }


    public function store(Request $request)
    {
        if(Periodicidad::create($request->all()))
        {
            Session::flash('message-success', 'Periodicidad creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Periodicidad');
        }
        return back();
    }


     public function update(Request $request)
     {
        $periodicidad = Periodicidad::findOrFail($request->id);
        if($periodicidad->update($request->all()))
        {
            Session::flash('message-success', 'Periodicidad actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Periodicidad');
        }
        return back();
     }

     public function destroy(Request $request)
     {
        $periodicidad = Periodicidad::findOrFail($request->id);
        if($periodicidad->delete())
        {
            Session::flash('message-success', 'Periodicidad eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Periodicidad');
        }
        return back();
     }
}
