<?php

namespace App\Http\Controllers;
use App\Banco;
use App\Sucursal;
use App\Localidad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SucursalRequest;
use Illuminate\Database\Query\Builder;


class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $sucursales = Sucursal::all();
      return view('sucursales.index', [
          'sucursales' => $sucursales
      ]);
    }

    public function create()
    {
        $localidades      = Localidad::all()->pluck('nombre', 'id');
        $bancos           = Banco::all()->pluck('nombre','id');
    //    $proyectos = [];

        return view('sucursales.create', [
            'localidades'         => $localidades,
            'bancos'              => $bancos,
    //        'proyectos'           => $proyectos
        ]);
    }


    public function store(SucursalRequest $sucursalrequest)
    {
        //dd($request);
        $data = $sucursalrequest->all();

        $data['user_id'] = Auth::user()->id;
        if (Sucursal::create($data))
        {
            Session::flash('message-success', 'Sucursal creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'La Sucursal no se ha podido guardar.');
        }
        return redirect()->route('sucursal.index');
    }

     public function show(Sucursal $sucursal)
     {
         return view('sucursales.show', compact('sucursal'));
     }


     public function edit(Sucursal $sucursal)
     {
        $localidades      = Localidad::all()->pluck('nombre', 'id');
        $bancos           = Banco::all()->pluck('nombre','id');
        return view('sucursales.edit', [
            'localidades'         => $localidades,
            'bancos'              => $bancos,
            'sucursal'            => $sucursal
        ]);
     }

     public function update(SucursalRequest $sucursalRequest, Sucursal $sucursal)
     {
        
         $sucursal->fill($sucursalRequest->all())->update();
         Session::flash('message-success', 'Sucursal actualizada satisfactoriamente.');
         return redirect()->route('sucursal.index');
     }


     public function destroy(Sucursal $sucursal)
     {
        Sucursal::where('slug' , $sucursal->slug)->delete();
        Session::flash('message-danger', 'Sucursal eliminada satisfactoriamente.');
        return redirect()->route('sucursal.index');
     }

}
