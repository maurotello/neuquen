<?php

namespace App\Http\Controllers;
use App\Localidad;
use App\Zona;
use App\Departamento;
use App\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LocalidadRequest;
use Illuminate\Database\Query\Builder;


class LocalidadController extends Controller
{

    public function index()
    {
      $localidades = Localidad::all();
      return view('localidades.index', [
          'localidades' => $localidades
      ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zonas = Zona::all()->pluck('nombre', 'id');
        $dptos = Departamento::all()->pluck('nombre', 'id');
        $provincias = Provincia::all()->pluck('nombre', 'id');
        return view('localidades.create', [
            'zonas'         => $zonas,
            'provincias'    => $provincias,
            'dptos'         => $dptos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalidadRequest $localidadRequest)
    {
        $data = $localidadRequest->all();
        $data['user_id'] = Auth::user()->id;
        $creada = Localidad::create($data);
        if ($creada){
            Session::flash('message-success', 'Localidad creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'La Localidad no se ha podido guardar.');
        }
        return redirect()->route('localidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(localidad $localidad)
     {
         return view('localidades.show', compact('localidad'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(localidad $localidad)
     {
        $zonas = Zona::all()->pluck('nombre', 'id');
        $dptos = Departamento::all()->pluck('nombre', 'id');
        $provincias = Provincia::all()->pluck('nombre', 'id');
        return view('localidades.edit', [
            'localidad' => $localidad,
            'zonas' => $zonas,
            'dptos' => $dptos,
            'provincias' => $provincias
        ]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(LocalidadRequest $localidadRequest, localidad $localidad)
    {
        if ($localidad->fill($localidadRequest->all())->update())
        {
         Session::flash('message-success', 'Localidad Actualizada satisfactoriamente.');
        }else{
         Session::flash('message-danger', 'La Localidad no se ha podido Actualizar.');
        }
        return redirect()->route('localidad.index');
    }
/*
     public function anyData()
    {
        return Localidad::of(Localidad::query())->make(true);
    }
*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(localidad $localidad)
     {
        if (Localidad::where('slug' , $localidad->slug)->delete())
        {
            Session::flash('message-success', 'Localidad Borrada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'La Localidad no se ha podido Borrar.');
        }
        return redirect()->route('localidad.index');
     }

}
