<?php

namespace App\Http\Controllers;
use App\User;
//use App\Proyecto;
use App\Columnasexcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Redirect;

class ColumnasexcelController extends Controller
{


    
    public function index()
    {
        $columnasexcel    = Columnasexcel::all();
        return view('columnasexcels.index', [
            'columnasexcel' => $columnasexcel
        ]);
    }

     public function create()
     {
         return view('columnasexcel.create');
     }

    
    public function store(Request $request)
    {
        $data = $request->all();
        
        if (Columnasexcel::create($data))
        {
            Session::flash('message-success', 'Columna Excel creada satisfactoriamente.');
        
        }else{
            Session::flash('message-danger', 'Error al intentar guardar el Anexo');
        }
        return redirect()->route('columnasexcel.index');
    }

 
     public function edit(Columnasexcel $columnasexcel)
     {
          return view('columnasexcels.edit', ['columnasexcel' => $columnasexcel]);
     }

   
     public function update(Request $request, Columnasexcel $columnasexcel)
     {
        if($columnasexcel->fill($request->all())->update())
        {
            
            Session::flash('message-success', 'Columna Excel actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar');
        }


        return redirect()->route('columnasexcel.index');
    }


    public function destroy(Columnasexcel $columnasexcel)
    {
        if (Columnasexcel::where('slug' , $columnasexcel->slug)->delete())
        {
            Session::flash('message-success', 'Columna Excel Eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar la Columna para el Informe en Excel');
        }
        return redirect()->route('columnasexcels.index');
    }

}
