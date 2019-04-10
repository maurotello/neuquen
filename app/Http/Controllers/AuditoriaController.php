<?php

namespace App\Http\Controllers;
use App\Auditoria;
use Illuminate\Http\Request;
use App\Http\Requests\AuditoriaRequest;

class AuditoriaController extends Controller
{

    protected $auditoria;

    public function __construct()
    {
        $this->middleware('permission:auditoria.index')->only('index');
        $this->middleware('permission:auditoria.create')->only(['create', 'store']);
        $this->middleware('permission:auditoria.edit')->only(['edit', 'update']);
        $this->middleware('permission:auditoria.show')->only('show');
        $this->middleware('permission:auditoria.destroy')->only('destroy');
        $this->auditoria = $this->getAuditoria();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auditorias.index', ['auditoria' => $this->auditoria]);
    }


    public function create()
    {
        return view('auditorias.create');
    }

    
     public function store(AuditoriaRequest $auditoriaRequest)
     {

         $this->validate($auditoriaRequest,[
             'fecha'=>'required',
         ]);
         $data = $movimientoRequest->all();
         $data['modelo'] = 'proyecto';
         if (Auditoria::create($data)){
            dd("ok");
         }else{
            dd("mal");
         }

         return;
         /*
         $data = $movimientoRequest->all();
         $data['user_id'] = Auth::user()->id;
         Movimiento::create($data);
         return redirect()->route('movimientos.index')->with('message', 'Movimiento ingresado.');
         */
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(auditoria $auditoria)
     {
         return view('auditorias.show', compact('auditoria'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(auditoria $auditoria)
     {
          return view('auditorias.edit', ['auditoria' => $auditoria]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(AuditoriaRequest $auditoriaRequest, auditoria $auditoria)
     {
         $auditoria->fill($auditoriaRequest->all())->update();
         Session::flash('message', 'Auditoria actualizado satisfactoriamente.');
         return redirect()->route('auditoria.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(auditoria $auditoria)
     {
         Auditoria::where('slug' , $slug)->delete();
         $this->auditoria = $this->getAuditoria();
         Session::flash('message-danger', 'Auditoria eliminado satisfactoriamente.');
         return redirect()->route('auditoria.index');
     }
     private function getAuditoria()
    {
        return Auditoria::all();
    }
}
