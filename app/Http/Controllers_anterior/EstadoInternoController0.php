<?php

namespace App\Http\Controllers;
use App\EstadoInterno;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoInternoRequest;

class EstadoInternoController extends Controller
{

    protected $estadointerno;

    public function __construct()
    {
        $this->estadointerno = $this->getEstadoInterno();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estadointerno.index', ['estadointerno' => $this->estadointerno]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadointerno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoInternoRequest $estadointernoRequest)
    {
        EstadoInterno::create($estadointernoRequest->all());
        return redirect()->route('estadointerno.index')->with('message', 'EstadoInterno ingresado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(estadointerno $estadointerno)
     {
         return view('estadointerno.show', compact('estadointerno'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(estadointerno $estadointerno)
     {
          return view('estadointernos.edit', ['estadointerno' => $estadointerno]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(EstadoInternoRequest $estadointernoRequest, estadointerno $estadointerno)
     {
         $estadointerno->fill($estadointernoRequest->all())->update();
         Session::flash('message', 'Estado Interno actualizado satisfactoriamente.');
         return redirect()->route('estadointerno.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(estadointerno $estadointerno)
     {
         EstadoInterno::where('slug' , $slug)->delete();
         $this->estadointerno = $this->getEstadoInterno();
         Session::flash('message-danger', 'Estado Interno eliminado satisfactoriamente.');
         return redirect()->route('estadointerno.index');
     }
     private function getEstadoInterno()
    {
        return EstadoInterno::all();
    }
}
