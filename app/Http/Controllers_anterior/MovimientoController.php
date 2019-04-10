<?php

namespace App\Http\Controllers;
use App\Movimiento;
use Illuminate\Http\Request;
use App\Http\Requests\MovimientoRequest;

class MovimientoController extends Controller
{

    protected $movimiento;

    public function __construct()
    {
        $this->middleware('permission:movimiento.index')->only('index');
        $this->middleware('permission:movimiento.create')->only(['create', 'store']);
        $this->middleware('permission:movimiento.edit')->only(['edit', 'update']);
        $this->middleware('permission:movimiento.show')->only('show');
        $this->middleware('permission:movimiento.destroy')->only('destroy');
        $this->movimiento = $this->getMovimiento();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimiento::all();
        return view('movimientos.index',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::get();
        return view('movimientos.create', compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovimientoRequest $movimientoRequest)
    {
        $data = $movimientoRequest->all();
        $data['user_id'] = Auth::user()->id;
        Movimiento::create($data);
        return redirect()->route('movimientos.index')->with('message', 'Movimiento ingresado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(movimiento $movimiento)
     {
         return view('movimientos.show', compact('movimiento'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(movimiento $movimiento)
     {
          return view('movimientos.edit', ['movimiento' => $movimiento]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(MovimientoRequest $movimientoRequest)
     {
        $garantia->fill($movimentoRequest->all())->update();
        Session::flash('message', 'Movimiento actualizado satisfactoriamente.');
        return redirect()->route('movimiento.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Movimiento $movimiento)
     {
         $movimiento->delete();
         Session::flash('message-danger', 'Movimiento eliminado satisfactoriamente!');
         return redirect()->route('movimiento.index');
     }
     private function getMovimiento()
    {
        return Movimiento::all();
    }
}
