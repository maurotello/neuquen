<?php

namespace App\Http\Controllers;
use App\EstadoCivil;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoCivilRequest;

class EstadoCivilController extends Controller
{

    protected $estadocivil;

    public function __construct()
    {
        $this->middleware('permission:estadoCivil.index')->only('index');
        $this->middleware('permission:estadoCivil.create')->only(['create', 'store']);
        $this->middleware('permission:estadoCivil.edit')->only(['edit', 'update']);
        $this->middleware('permission:estadoCivil.show')->only('show');
        $this->middleware('permission:estadoCivil.destroy')->only('destroy');
        $this->estadocivil = $this->getEstadoCivil();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estadocivil.index', ['estadocivil' => $this->estadocivil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadocivil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoCivilRequest $estadocivilRequest)
    {
        EstadoCivil::create($estadocivilRequest->all());
        return redirect()->route('estadocivil.index')->with('message', 'Estado Civil ingresado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(estadocivil $estadocivil)
     {
         return view('estadocivil.show', compact('estadocivil'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(estadocivil $estadocivil)
     {
          return view('estadocivil.edit', ['estadocivil' => $estadocivil]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(EstadoCivilRequest $estadocivilRequest, estadocivil $estadocivil)
     {
         $estadocivil->fill($estadocivilRequest->all())->update();
         Session::flash('message', 'Estado Civil actualizado satisfactoriamente.');
         return redirect()->route('estadocivil.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(estadocivil $estadocivil)
     {
         EstadoCivil::where('slug' , $slug)->delete();
         $this->estadocivil = $this->getEstadoCivil();
         Session::flash('message-danger', 'Estado Civil eliminado satisfactoriamente.');
         return redirect()->route('estadocivil.index');
     }
     private function getEstadoCivil()
    {
        return EstadoCivil::all();
    }
}
