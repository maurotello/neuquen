<?php

namespace App\Http\Controllers;
use App\Garantia;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\GarantiaRequest;

class GarantiaController extends Controller
{

    protected $garantia;

    public function __construct()
    {
        $this->middleware('permission:garantia.index')->only('index');
        $this->middleware('permission:garantia.create')->only(['create', 'store']);
        $this->middleware('permission:garantia.edit')->only(['edit', 'update']);
        $this->middleware('permission:garantia.show')->only('show');
        $this->middleware('permission:garantia.destroy')->only('destroy');
        $this->garantia = $this->getGarantia();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garantias = Garantia::all();
        return view('garantias.index',compact('garantias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('garantias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Garantia::create($request->all()))
        {
            Session::flash('message-success', 'Garantía creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Garantía');
        }
        return back();
        //Garantia::create($garantiaRequest->all());
        //return redirect()->route('garantia.index')->with('message', 'Garantia ingresado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(garantia $garantia)
     {
         //return view('garantias.show', compact('garantia'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(garantia $garantia)
     {
          //return view('garantias.edit', ['garantia' => $garantia]);
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
        $garantia = Garantia::findOrFail($request->id);
        if($garantia->update($request->all()))
        {
            Session::flash('message-success', 'Figura Legal actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Figura Legal');
        }
        return back();

         //$garantia->fill($garantiaRequest->all())->update();
         //Session::flash('message', 'Garantia actualizado satisfactoriamente.');
         //return redirect()->route('garantia.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
    {
        $garantia = Garantia::findOrFail($request->id);
        if($garantia->delete())
        {
            Session::flash('message-success', 'Figura Legal eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Figura Legal');
        }
        return back();
    }
     private function getGarantia()
    {
        return Garantia::all();
    }
}
