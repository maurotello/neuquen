<?php

namespace App\Http\Controllers;
use App\Banco;
use DataTables;
use DataTable\BancoDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\BancoRequest;

class BancoController extends Controller
{

    protected $banco;

    public function __construct()
    {
        $this->banco = $this->getBanco();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bancos.index', ['bancos' => $this->banco]);
    }

    public function data_bancos(){
           return Datatables::of( Banco::all())->make(true);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bancos1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BancoRequest $bancoRequest)
    {
        Banco::create($bancoRequest->all());
        return redirect()->route('banco.index')->with('message', 'Banco ingresado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(banco $banco)
     {
         return view('bancos1.show', compact('banco'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(banco $banco)
     {
          return view('bancos1.edit', ['banco' => $banco]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(BancoRequest $bancoRequest, banco $banco)
     {
         $banco->fill($bancoRequest->all())->update();
         Session::flash('message', 'Banco actualizado satisfactoriamente.');
         return redirect()->route('banco.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(banco $banco)
     {
         Banco::where('slug' , $slug)->delete();
         $this->banco = $this->getBanco();
         Session::flash('message-danger', 'Banco eliminado satisfactoriamente.');
         return redirect()->route('banco.index');
     }
     private function getBanco()
    {
        return Banco::all();
    }
}
