<?php

namespace App\Http\Controllers;
use App\User;
//use App\Proyecto;
use App\Columnasview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Redirect;

class ColumnasviewController extends Controller
{


    
    public function index()
    {
        $columnasviews = Columnasview::all();
        return view('columnasviews.index', [
            'columnasview' => $columnasviews
        ]);
    }

     public function create()
     {
         return view('columnasviews.create');
     }

    
    public function store(Request $request)
    {
        $data = $request->all();
        
        if (Columnasview::create($data))
        {
            Session::flash('message-success', 'Columna Excel creada satisfactoriamente.');
        
        }else{
            Session::flash('message-danger', 'Error al intentar guardar el Anexo');
        }
        return redirect()->route('columnasview.index');
    }

 
     public function edit(Columnasview $columnasview)
     {
          return view('columnasviews.edit', ['columnasview' => $columnasview]);
     }

   
     public function update(Request $request, Columnasview $columnasview)
     {
        if($columnasview->fill($request->all())->update())
        {
            
            Session::flash('message-success', 'Columna Excel actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar');
        }


        return redirect()->route('columnasview.index');
    }


    public function destroy(Columnasview $columnasview)
    {
        if (Columnasviews::where('slug' , $columnasview->slug)->delete())
        {
            Session::flash('message-success', 'Columna Excel Eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar la Columna para el Informe en Excel');
        }
        return redirect()->route('columnasview.index');
    }

}
