<?php

namespace App\Http\Controllers;
use App\FiguraLegal;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\FiguraLegalRequest;

class FiguraLegalController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('permission:figuraLegal.index')->only('index');
        $this->middleware('permission:figuraLegal.create')->only(['create', 'store']);
        $this->middleware('permission:figuraLegal.edit')->only(['edit', 'update']);
        $this->middleware('permission:figuraLegal.show')->only('show');
        $this->middleware('permission:figuraLegal.destroy')->only('destroy');
       
    }
    
    public function index()
    {
        //return view('figuralegal.index', ['figuralegal' => $this->figuralegal]);
        $figuralegal = FiguraLegal::all();
        return view('figuralegal.index',compact('figuralegal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  return view('figuralegal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
        if(FiguraLegal::create($request->all()))
        {
            Session::flash('message-success', 'Figura Legal creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Figura Legal');
        }
        return back();
         //Garantia::create($garantiaRequest->all());
         //return redirect()->route('garantia.index')->with('message', 'Garantia ingresado.');
     }
     /*
    public function store(FiguraLegalRequest $figuralegalRequest)
    {
        FiguraLegal::create($figuralegalRequest->all());
        return redirect()->route('figuralegal.index')->with('message', 'FiguraLegal ingresado.');
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(figuralegal $figuralegal)
     {
         //return view('figuralegal.show', compact('figuralegal'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(figuralegal $figuralegal)
     {
        //  return view('figuralegal.edit', ['figuralegal' => $figuralegal]);
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
        $figuralegal = FiguraLegal::findOrFail($request->id);
        if($figuralegal->update($request->all()))
        {
            Session::flash('message-success', 'Figura Legal actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Figura Legal');
        }
        return back();
     }

     /*
     public function update(FiguraLegalRequest $figuralegalRequest, figuralegal $figuralegal)
     {
         $figuralegal->fill($figuralegalRequest->all())->update();
         Session::flash('message', 'FiguraLegal actualizado satisfactoriamente.');
         return redirect()->route('figuralegal.index');
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
        $figuralegal = FiguraLegal::findOrFail($request->id);
        if($figuralegal->delete())
        {
            Session::flash('message-success', 'Figura Legal eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Figura Legal');
        }
        return back();
     }
     /*
     public function destroy(figuralegal $figuralegal)
     {
         FiguraLegal::where('slug' , $slug)->delete();
         $this->figuralegal = $this->getFiguraLegal();
         Session::flash('message-danger', 'FiguraLegal eliminado satisfactoriamente.');
         return redirect()->route('figuralegal.index');
     }
     */

}
