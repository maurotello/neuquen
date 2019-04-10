<?php

namespace App\Http\Controllers;
use App\Sector;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\SectorRequest;

class SectorController extends Controller
{

    protected $sector;

    public function __construct()
    {
        $this->middleware('permission:sector.index')->only('index');
        $this->middleware('permission:sector.create')->only(['create', 'store']);
        $this->middleware('permission:sector.edit')->only(['edit', 'update']);
        $this->middleware('permission:sector.show')->only('show');
        $this->middleware('permission:sector.destroy')->only('destroy');
        $this->sector = $this->getSector();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $sectores = Sector::all();
         return view('sectores.index',compact('sectores'));
     }
     /*
    public function index()
    {
        return view('sectores.index', ['sector' => $this->sector]);
    }
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  return view('sectores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
        if(Sector::create($request->all()))
        {
            Session::flash('message-success', 'Sector creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Sector');
        }
        return back();
     }
     /*
    public function store(SectorRequest $sectorRequest)
    {
        Sector::create($sectorRequest->all());
        return redirect()->route('sector.index')->with('message', 'Sector ingresada.');
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(sector $sector)
     {
         //return view('sectores.show', compact('sector'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(sector $sector)
     {
          //return view('sectores.edit', ['sector' => $sector]);
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
        $sector = Sector::findOrFail($request->id);
        if($sector->update($request->all()))
        {
            Session::flash('message-success', 'Sector actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Sector');
        }
        return back();
     }
     /*
     public function update(SectorRequest $sectorRequest, sector $sector)
     {
         $sector->fill($sectorRequest->all())->update();
         Session::flash('message', 'Sector actualizada satisfactoriamente.');
         return redirect()->route('sector.index');
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
        $sector = Sector::findOrFail($request->id);
        if($sector->delete())
        {
            Session::flash('message-success', 'Sector eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Sector');
        }
        return back();
     }
    
     private function getSector()
    {
        return Sector::all();
    }
}
