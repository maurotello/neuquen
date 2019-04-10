<?php

namespace App\Http\Controllers;
use App\Banco;
use App\Desembolso;
use App\Proyecto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\DesembolsoRequest;
use Illuminate\Database\Query\Builder;


class DesembolsoController extends Controller
{
    public function index()
    {
      $proyectos = Proyecto::all();
      return view('desembolsos.index', [
          'proyectos' => $proyectos
      ]);
    }

    public function create()
    {
        $proyectos = Proyecto::all()->pluck('nombre', 'id');

        return view('desembolsos.create', [
            'proyectos' => $proyectos
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['fecha'] = \Carbon\Carbon::parse($data['fecha'])->format('Y-m-d');
        $data['proyecto_id'] = (int) $request['proyecto_id'];
        $data['slug'] = str_slug($data['fecha'] . '_' . $data['proyecto_id'] . '_' . rand(1,10000));

        if(Desembolso::create($data))
        {
            return back()->with('message','Todo bien');
        }else{
            return back()->with('message','Error');
        }
    }

     public function show(Desembolso $desembolso)
     {
         return view('desembolsos.show', compact('desembolso'));
     }

    public function desembolsoEdit(Request $request)
    {
        if($request->ajax()){
            $desembolso = Desembolso::Find($request->id);
            return Response($desembolso);
        }
    }

    public function updateAjax(Request $req)
    {
        $id          = (int) $req->id;
        $fecha       = $req->fecha;
        $nro         = $req->nro;
        $monto       = $req->monto;
        $descripcion = $req->descripcion;


        $dese = Desembolso::find($id);

        $dese->fecha = \Carbon\Carbon::parse($fecha)->format('Y-m-d');
        $dese->nro = (int) $nro;
        $dese->monto = floatval($monto);
        $dese->descripcion = htmlentities($descripcion);
        if ($dese->save())
        {
            return response()->json(true);
        }else{
            return response()->json(false);
        }

        //return response()->json($dese->fecha);
    }

    public function search(Request $req)
    {
        $desembolso = Desembolso::where('id', $req->id)->first();
        return response()->json($desembolso);
    }

/*
     public function edit(Desembolso $desembolso)
     {
        $proyectos = Proyecto::all()->pluck('nombre', 'id');

        return view('desembolsos.edit', [
            'proyectos'  => $proyectos
        ]);
     }
*/
     public function update2(Request $request, $id)
        {

            $data = Desembolso::FindOrFail($id);
            $input = $request->all();
            //$input['updated_by'] = Session('loggedSessionData.id');
            //$class_id = $request->class_id;


            try {
                //$data->update($input);
                $result = 0;
            } catch (\Exception $e) {
                $result = $e->errorInfo[1];
            }

            if ($result == 0) {
                    $notification = array(
                    'message' => 'Class Routine Successfully Updated.',
                    'alert-type' => 'success'
                );
                //return redirect('desembolso/'.$class_id)->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Error Found !, Please try again.',
                    'alert-type' => 'error'
                );
                //return redirect('class_routine/'.$class_id)->with($notification);
            }
        }

     public function update(DesembolsoRequest $desembolsoRequest, Desembolso $desembolso)
     {
         $desembolso->fill($desembolsoRequest->all())->update();
         Session::flash('message-success', 'Desembolso actualizado satisfactoriamente.');
         return redirect()->route('desembolso.index');
     }

     public function destroy(Desembolso $desembolso)
     {
        Desembolso::where('slug' , $desembolso->slug)->delete();
        Session::flash('message-danger', 'Desembolso eliminado satisfactoriamente.');
        return redirect()->route('desembolso.index');
     }

}
