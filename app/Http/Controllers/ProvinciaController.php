<?php

namespace App\Http\Controllers;
use App\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProvinciaRequest;

class ProvinciaController extends Controller
{

    protected $provincia;

    public function __construct()
    {
        $this->middleware('permission:provincia.index')->only('index');
        $this->middleware('permission:provincia.create')->only(['create', 'store']);
        $this->middleware('permission:provincia.edit')->only(['edit', 'update']);
        $this->middleware('permission:provincia.show')->only('show');
        $this->middleware('permission:provincia.destroy')->only('destroy');
        $this->provincia = $this->getProvincia();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $provincias = Provincia::all();
         return view('provincias.index',compact('provincias'));
     }
     /*
    public function index()
    {
        return view('provincias.index', ['provincia' => $this->provincia]);
    }
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('provincias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        if(Provincia::create($request->all()))
        {
            Session::flash('message-success', 'Provincia creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Provincia');
        }
        return back();
     }
     /*
    public function store(ProvinciaRequest $provinciaRequest)
    {
        Provincia::create($provinciaRequest->all());
        return redirect()->route('provincia.index')->with('message', 'Provincia ingresada.');
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(provincia $provincia)
     {
        // return view('provincias.show', compact('provincia'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(provincia $provincia)
     {
          //return view('provincias.edit', ['provincia' => $provincia]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
     {
        $provincia = Provincia::findOrFail($request->id);
        if($provincia->update($request->all()))
        {
            Session::flash('message-success', 'Provincia actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Provincia');
        }
        return back();
     }
     /*
     public function update(ProvinciaRequest $provinciaRequest, provincia $provincia)
     {
         $provincia->fill($provinciaRequest->all())->update();
         Session::flash('message', 'Provincia actualizada satisfactoriamente.');
         return redirect()->route('provincia.index');
     }
*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
        $provincia = Provincia::findOrFail($request->id);
        if($provincia->delete())
        {
            Session::flash('message-success', 'Provincia eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Provincia');
        }
        return back();
     }

     private function getProvincia()
    {
        return Provincia::all();
    }
}
