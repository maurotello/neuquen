<?php

namespace App\Http\Controllers;
use App\Banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BancoRequest;

class BancoController extends Controller
{

    protected $banco;

    public function __construct()
    {
        $this->middleware('permission:banco.index')->only('index');
        $this->middleware('permission:banco.create')->only(['create', 'store']);
        $this->middleware('permission:banco.edit')->only(['edit', 'update']);
        $this->middleware('permission:banco.show')->only('show');
        $this->middleware('permission:banco.destroy')->only('destroy');
        $this->banco = $this->getBanco();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return DataTables::of(Banco::query())->make(true);
      $bancos = Banco::all();
      //$bancos = Banco::select(['id', 'nombre', 'updated_at']);
      return view('bancos.index',compact('bancos'));
        //return view('bancos.index', ['banco' => $this->banco]);
    }
    /*
    public function getSucursales()
    {
        $sucursales = DB::table('sucursales')
            ->select(['nombtr', 'email', 'id']);

        return Datatables::of($sucursales)->make(true);
    }
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('bancos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        Banco::create($request->all());
        return back();
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(banco $banco)
     {
         //return view('bancos.show', compact('banco'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(banco $banco)
     {
        //  return view('bancos.edit', ['banco' => $banco]);
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
        $banco = Banco::findOrFail($request->id);
        if($banco->update($request->all()))
        {
            Session::flash('message-success', 'Banco actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar el Banco');
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
        $banco = Banco::findOrFail($request->id);
        if($banco->delete())
        {
            Session::flash('message-success', 'Banco eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar el Banco');
        }
        return back();
    }
     private function getBanco()
    {
        return Banco::all();
    }
}
