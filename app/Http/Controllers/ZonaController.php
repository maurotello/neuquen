<?php

namespace App\Http\Controllers;
use App\Zona;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\ZonaRequest;

class ZonaController extends Controller
{

    protected $zona;

    public function __construct()
    {
        $this->middleware('permission:zona.index')->only('index');
        $this->middleware('permission:zona.create')->only(['create', 'store']);
        $this->middleware('permission:zona.edit')->only(['edit', 'update']);
        $this->middleware('permission:zona.show')->only('show');
        $this->middleware('permission:zona.destroy')->only('destroy');
        $this->zona = $this->getZona();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $zonas = Zona::all();
         return view('zonas.index',compact('zonas'));
     }
     /*
    public function index()
    {
        return view('zonas.index', ['zona' => $this->zona]);
    }
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('zonas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        if(Zona::create($request->all()))
        {
            Session::flash('message-success', 'Zona creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Zona');
        }
        return back();
     }
     /*
    public function store(ZonaRequest $zonaRequest)
    {
        Zona::create($zonaRequest->all());
        return redirect()->route('zona.index')->with('message', 'Zona ingresada.');
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(zona $zona)
     {
         //return view('zonas.show', compact('zona'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(zona $zona)
     {
        //  return view('zonas.edit', ['zona' => $zona]);
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

        $zona = Zona::findOrFail($request->id);
        if($zona->update($request->all()))
        {
            Session::flash('message-success', 'Zona actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Zona');
        }
        return back();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
        $zona = Zona::findOrFail($request->id);
        if($zona->delete())
        {
            Session::flash('message-success', 'Zona eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Zona');
        }
        return back();
     }

     private function getZona()
    {
        return Zona::all();
    }
}
