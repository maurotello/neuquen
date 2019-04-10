<?php

namespace App\Http\Controllers;
use App\Proyecto;
use App\Localidad;
use App\LineaCredito;
use App\Estado;
use App\Movimiento;
use App\Desembolso;
use App\SujetoCredito;
use App\EstadoInterno;
use App\Refinanciacion;
use App\Sector;
use App\Titular;
use App\Sucursal;
use App\Columnasview;
use App\AnexoProyecto;
use App\FiguraLegal;
use App\EstadoCivil;
use App\Periodicidad;
use App\DestinoCredito;
use Carbon\Carbon;
use App\Garantia;
use PHPExcel; 
use PHPExcel_IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProyectoRequest;
use Illuminate\Database\Query\Builder;


class ProyectoController extends Controller
{


    public function datatable()
    {
        return view('proyectos.datatable');
    }

    public function getPosts()
    {

        $model = Proyecto::with('localidad', 'estado', 'sector', 'figuraLegal');

        return \DataTables::eloquent($model)
        ->addColumn('id','nombre')
        ->toJson();
    }


    public function search()
    {
        
        
        $proyectos = Proyecto::where('user_id', '<>', null);
        
        if(isset($_POST['fechaIngreso_desde']))
        {
            $fecha_desde = Carbon::parse($_POST['fechaIngreso_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaIngreso_hasta'])->format('Y-m-d');
            $proyectos->whereBetween('fechaIngreso', [$fecha_desde, $fecha_hasta]);
            
        }

        if($_POST['fechaEnvioBanco_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaEnvioBanco_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaEnvioBanco_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaEnvioBanco', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaRespuestaBanco_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaRespuestaBanco_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaRespuestaBanco_hasta'])->format('Y-m-d');
            $proyectos->whereBetween('fechaRespuestaBanco', [$fecha_desde, $fecha_hasta]);
        }


        if($_POST['fechaCaducoBanco_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaCaducoBanco_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaCaducoBanco_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaCaducoBanco', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaAprobadoUep_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaAprobadoUep_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaAprobadoUep_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaAprobadoUep', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaEnviadoCfi_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaEnviadoCfi_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaEnviadoCfi_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaEnviadoCfi', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaAprobadoCfi_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaAprobadoCfi_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaAprobadoCfi_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaAprobadoCfi', [$fecha_desde, $fecha_hasta]);
        }


        if($_POST['fechaTramdispo_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaTramdispo_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaTramdispo_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaTramdispo', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaComunicaTran_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaComunicaTran_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaComunicaTran_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaComunicaTran', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaDesembolso_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaDesembolso_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaDesembolso_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaDesembolso', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaEfectivizacion_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaEfectivizacion_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaEfectivizacion_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaEfectivizacion', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaDesistido_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaDesistido_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaDesistido_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaDesistido', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaJudicial_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaJudicial_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaJudicial_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaJudicial', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaCancelado_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaCancelado_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaCancelado_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaCancelado', [$fecha_desde, $fecha_hasta]);
        }

        if($_POST['fechaArchivado_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaArchivado_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaArchivado_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaArchivado', [$fecha_desde, $fecha_hasta]);
        }
        if($_POST['fechaUltimoMovimiento_desde'])
        {
            $fecha_desde = Carbon::parse($_POST['fechaUltimoMovimiento_desde'])->format('Y-m-d');
            $fecha_hasta = Carbon::parse($_POST['fechaUltimoMovimiento_hasta'])->format('Y-m-d');

            $proyectos->whereBetween('fechaUltimoMovimiento', [$fecha_desde, $fecha_hasta]);
        }
        $columnas = Columnasview::where('seleccionada', 'ON')->get();
        return view('proyectos.index', [
            'columnas'  => $columnas,
            'proyectos' => $proyectos->get()
        ]);
       
    }
    public function excel()
    {
        $columnas = Columnasexcel::where('seleccionada', 'ON')->get();

        
        $campos = Columnasexcel::select('nombre')->where('seleccionada', 'ON')->get()->toArray();
        dd($campos);
        $proyectos = Proyecto::all();
        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Europe/London');

        if (PHP_SAPI == 'cli')
            die('This example should only be run from a Web Browser');


        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("UEP - Neuquén")
                                        ->setLastModifiedBy("UEP - Neuquén")
                                        ->setTitle("Proyectos UEP Neuquén");

        $col = 1;
      
        foreach($columnas as $c)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $c->descripcion);
            
            $col++;
        }

        foreach($proyectos as $p)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $c->descripcion);
        }
        
       

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Proyectos');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Proyectos-UEP-Neuquen.xls"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
    }
    public function index()
    {
      $proyectos = Proyecto::all();
      $columnas = Columnasview::where('seleccionada', 'ON')->get();
      return view('proyectos.index', [
          'proyectos' => $proyectos,
          'columnas'  => $columnas
      ]);
    }


    public function filtrar($estado)
    {
        $estado =   Estado::where('nombre',$estado)->first();
        $proyectos =   Proyecto::where('estado_id', $estado['id'])->get();
      return view('proyectos.index', [
          'proyectos' => $proyectos
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $localidades      = Localidad::all()->pluck('nombre', 'id');
        $lineasCreditos   = LineaCredito::all()->pluck('nombre', 'id');
        $estados          = Estado::all()->pluck('nombre', 'id');
        $estadosInternos  = EstadoInterno::all()->pluck('nombre', 'id');
        $sectores         = Sector::all()->pluck('nombre', 'id');
        $figurasLegales   = FiguraLegal::all()->pluck('nombre', 'id');
        $periodicidades   = Periodicidad::all()->pluck('nombre', 'id');
        $destinosCreditos = DestinoCredito::all()->pluck('nombre', 'id');
        $garantias        = Garantia::all()->pluck('nombre', 'id');
        $sucursales       = Sucursal::all()->pluck('nombre', 'id');
        $sujetoCreditos   = SujetoCredito::all();
        //$anexos           = AnexoProyecto::where('proyecto_id', $proyecto->id)->get();
        //    $proyectos = [];

        return view('proyectos.create', [
            'localidades'         => $localidades,
            'lineasCreditos'      => $lineasCreditos,
            'estados'             => $estados,
            'estadosInternos'     => $estadosInternos,
            'sectores'            => $sectores,
            'figurasLegales'      => $figurasLegales,
            'periodicidades'      => $periodicidades,
            'destinosCreditos'    => $destinosCreditos,
            'garantias'           => $garantias,
            'sujetoCreditos'      => $sujetoCreditos,
            'action'               =>'create',
            'sucursales'          => $sucursales,
            //        'proyectos'           => $proyectos
        ]);
    }


    public function store(ProyectoRequest $request)
    {
        //dd($request);
        $data = $request->all();
        //dd($data);
       // $data['user_id'] = Auth::user()->id;

        if ($data['fechaAprobadoCfi'])
        {
            if(is_null($data['numeroCfi']))
            {
                Session::flash('message-warning', 'Proyecto Aprobado por el CFI sin número de CFI');
                return redirect()->back();
            }
            
        }


        
        $data['fechaIngreso'] = Carbon::parse($data['fechaIngreso'])->format('Y-m-d');
        
        //$enviadoBco = SujetoCredito::where('proyecto_id', $data['id'])->count();
        if ($data['fechaCaducoBanco'])
        {
            $data['fechaCaducoBanco'] = Carbon::parse($data['fechaCaducoBanco'])->format('Y-m-d');
            if ($data['fechaCaducoBanco'] <= $data['fechaIngreso']){
                Session::flash('message-danger', 'La Fecha Caduco Banco no puede ser menor o igual a la fecha de Ingreso');
            }
            $enviadoBco = SujetoCredito::where('proyecto_id', $data['id'])->count();
            if ($enviadoBco = 0){
                Session::flash('message-danger', 'No puede colocar fecha de Caduco Banco sin haber enviado el proyecto al Banco por Sujeto de Crédito');
            }
        }
        if ($data['fechaAprobadoUep'])
        {
            $data['fechaAprobadoUep'] = Carbon::parse($data['fechaAprobadoUep'])->format('Y-m-d');
            if ($data['fechaAprobadoUep'] <= $data['fechaIngreso']){
                Session::flash('message-danger', 'La Fecha Caduco Banco no puede ser menor o igual a la fecha de Ingreso');
            }

            if ($enviadoBco = 0){
                Session::flash('message-danger', 'No puede colocar fecha Aprobado UEP sin haber enviado el proyecto al Banco por Suejto de Crédito');
            }
        }


            /*
        if ($data['fechaEnviadoCfi'])
        {
            $data['fechaEnviadoCfi'] = Carbon::parse($data['fechaEnviadoCfi'])->format('Y-m-d');

            if ($data['fechaEnviadoCfi'] <= $data['fechaIngreso']){
                Session::flash('message-danger', 'La Fecha Enviado al CFI no puede ser menor o igual a la fecha de Ingreso');
            }

            if ($enviadoBco = 0){
                Session::flash('message-danger', 'No puede enviar al CFI un proyecto que no fue  enviado al Banco por Suejto de Crédito');
            }

            if ($data['fechaEnviadoCfi'] <= $data['fechaAprobadoUep']){
                Session::flash('message-danger', 'No puede enviar al CFI un proyecto con fecha menor a la fecha de Aprobado por la UEP');
            }

            if (!isset($data['fechaAprobadoUep']))
            {
                Session::flash('message-danger', 'No puede colocar una fecha de Enviado al CFI un proyecto que no tiene cargada la fecha de Aprobado por la UEP');
            }

        }
        */
        if ($data['fechaEnviadoCfi'])
        {
            $data['fechaEnviadoCfi'] = Carbon::parse($data['fechaEnviadoCfi'])->format('Y-m-d');
        }
        $data['fechaIngreso'] = Carbon::parse($data['fechaIngreso'])->format('Y-m-d');
        if ($data['fechaAprobadoCfi'])
            $data['fechaAprobadoCfi'] = Carbon::parse($data['fechaAprobadoCfi'])->format('Y-m-d');

        if ($data['fechaTramdispo'])
            $data['fechaTramdispo'] = Carbon::parse($data['fechaTramdispo'])->format('Y-m-d');

        if ($data['fechaComunicaTran'])
            $data['fechaComunicaTran'] = Carbon::parse($data['fechaComunicaTran'])->format('Y-m-d');

        if ($data['fechaDesembolso'])
            $data['fechaDesembolso'] = Carbon::parse($data['fechaDesembolso'])->format('Y-m-d');

        if ($data['fechaEfectivizacion'])
            $data['fechaEfectivizacion'] = Carbon::parse($data['fechaEfectivizacion'])->format('Y-m-d');

        if ($data['fechaDesistido'])
            $data['fechaDesistido'] = Carbon::parse($data['fechaDesistido'])->format('Y-m-d');

        if ($data['fechaJudicial'])
            $data['fechaJudicial'] = Carbon::parse($data['fechaJudicial'])->format('Y-m-d');

        if ($data['fechaCancelado'])
            $data['fechaCancelado'] = Carbon::parse($data['fechaCancelado'])->format('Y-m-d');

        if ($data['fechaArchivado'])
            $data['fechaArchivado'] = Carbon::parse($data['fechaArchivado'])->format('Y-m-d');

        if ($data['fechaUltimoMovimiento'])
            $data['fechaUltimoMovimiento'] = Carbon::parse($data['fechaUltimoMovimiento'])->format('Y-m-d');
        
        //dd($data);
        if (Proyecto::create($data))
        {

            Session::flash('message-success', 'Proyecto creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'El Proyecto no se ha podido guardar.');
        }
        return redirect()->route('proyecto.index');
    }


     public function show(Proyecto $proyecto)
     {
         return view('proyectos.show', compact('proyecto'));
     }


    public function edit(Proyecto $proyecto)
    {
        $localidades      = Localidad::all()->pluck('nombre', 'id');
        $lineasCreditos   = LineaCredito::all()->pluck('nombre', 'id');
        $estados          = Estado::all()->pluck('nombre', 'id');
        $estadosInternos  = EstadoInterno::all()->pluck('nombre', 'id');
        $sectores         = Sector::all()->pluck('nombre', 'id');
        $figurasLegales   = FiguraLegal::all()->pluck('nombre', 'id');
        $periodicidades   = Periodicidad::all()->pluck('nombre', 'id');
        $destinosCreditos = DestinoCredito::all()->pluck('nombre', 'id');
        $estadoCivil      = EstadoCivil::all()->pluck('nombre', 'id');
        $garantias        = Garantia::all()->pluck('nombre', 'id');
        $sucursales       = Sucursal::all()->pluck('nombre', 'id');
        $anexos           = AnexoProyecto::where('proyecto_id', $proyecto->id)->get();
        $refinanciaciones = Refinanciacion::where('proyecto_id', $proyecto->id)->get();
        $movimientos      = Movimiento::where('proyecto_id', $proyecto->id)->get();
        $titulares        = Titular::where('proyecto_id', $proyecto->id)->get();
        $desembolsos      = Desembolso::where('proyecto_id', $proyecto->id)->get();
        $sujetoCredito    = SujetoCredito::where('proyecto_id', $proyecto->id)->get();
        $cantidadDesembolsos = count($desembolsos);
        $cantidadSujetoCredito = count($sujetoCredito);
       

        return view('proyectos.edit', [
            'proyecto'            => $proyecto,
            'localidades'         => $localidades,
            'lineasCreditos'      => $lineasCreditos,
            'estados'             => $estados,
            'estadosInternos'     => $estadosInternos,
            'sectores'            => $sectores,
            'figurasLegales'      => $figurasLegales,
            'periodicidades'      => $periodicidades,
            'destinosCreditos'    => $destinosCreditos,
            'garantias'           => $garantias,
            'titulares'           => $titulares,
            'sucursales'          => $sucursales,
            'desembolsos'         => $desembolsos,
            'estadoCivil'         => $estadoCivil,
            'sujetoCredito'       => $sujetoCredito,
            'action'              =>'edit',
            'movimientos'         => $movimientos,
            'cantidadDesembolsos' => $cantidadDesembolsos,
            'anexos'              =>$anexos,
            'refinanciaciones'    => $refinanciaciones,
            'user_id'             => Auth::user()->id,
            'cantidadSujetoCredito' => $cantidadSujetoCredito,

        ]);
    }


    public function editar($id)
    {
        $proyecto         = Proyecto::find($id);
        $localidades      = Localidad::all()->pluck('nombre', 'id');;
        $lineasCreditos   = LineaCredito::all()->pluck('nombre', 'id');
        $estados          = Estado::all()->pluck('nombre', 'id');
        $estadosInternos  = EstadoInterno::all()->pluck('nombre', 'id');
        $sectores         = Sector::all()->pluck('nombre', 'id');
        $figurasLegales   = FiguraLegal::all()->pluck('nombre', 'id');
        $periodicidades   = Periodicidad::all()->pluck('nombre', 'id');
        $destinosCreditos = DestinoCredito::all()->pluck('nombre', 'id');
        $estadoCivil      = EstadoCivil::all()->pluck('nombre', 'id');
        $garantias        = Garantia::all()->pluck('nombre', 'id');
        $sucursales       = Sucursal::all()->pluck('nombre', 'id');
        $movimientos      = Movimiento::where('proyecto_id', $proyecto->id)->get();
        $desembolsos      = Desembolso::where('proyecto_id', $proyecto->id)->get();
        $sujetoCredito    = SujetoCredito::where('proyecto_id', $proyecto->id)->get();
        $cantidadDesembolsos = count($desembolsos);
        $cantidadSujetoCredito = count($sujetoCredito);
        $refinanciaciones = Refinanciacion::where('proyecto_id', $proyecto->id)->get();
        

        $anexos = DB::table('anexos_proyectos')
            ->where('proyecto_id', '=', $proyecto->id)
            ->get();

        return view('proyectos.edit', [
            'proyecto'            => $proyecto,
            'localidades'         => $localidades,
            'lineasCreditos'      => $lineasCreditos,
            'estados'             => $estados,
            'estadosInternos'     => $estadosInternos,
            'sectores'            => $sectores,
            'figurasLegales'      => $figurasLegales,
            'periodicidades'      => $periodicidades,
            'destinosCreditos'    => $destinosCreditos,
            'garantias'           => $garantias,
            'sucursales'          => $sucursales,
            'desembolsos'         => $desembolsos,
            'estadoCivil'         => $estadoCivil,
            'sujetoCredito'       => $sujetoCredito,
            'action'               =>'edit',
            'movimientos'         => $movimientos,
            'cantidadDesembolsos' => $cantidadDesembolsos,
            'anexos'              => $anexos,
            'user_id'             => Auth::user()->id,
            'cantidadSujetoCredito' => $cantidadSujetoCredito,
            'refinanciaciones'    => $refinanciaciones

        ]);
    }


    public function update(ProyectoRequest $proyectoRequest, Proyecto $proyecto)
    {
        //dd($proyectoRequest);

        $data = $proyectoRequest->all();
        //dd($data);
        $data['fechaIngreso'] = Carbon::parse($data['fechaIngreso'])->format('Y-m-d');

        /*******************************************************/
        /************** COMPROBACIONES *************************/

        

        $estado_cfi = Estado::where('nombre','CFI')->first();
        // Entra a este IF si el estado es CFI
        // La condición entre otras es que tenga fecha de Aprobado por la UEP y fecha de Envio al CFI para 
        // poder ponerle el estado CFI
        if ($data['estado_id'] == $estado_cfi->id)
        {
            if(is_null($data['fechaAprobadoUep']))
            {
                Session::flash('message-warning', 'Proyecto con Estado "CFI" sin fecha de Aprobado por la UEP');
                return redirect()->back();
            }
            if(is_null($data['fechaEnviadoCfi']))
            {
                Session::flash('message-warning', 'Proyecto con Estado "CFI" sin fecha de Enviado al CFI');
                return redirect()->back();
            }
            
        }

        if ($data['fechaAprobadoCfi'])
        {

              if(is_null($data['numeroCfi']))
              {
                  Session::flash('message-warning', 'Proyecto Aprobado por el CFI sin número de CFI');
                  return redirect()->back();
              }
              if(is_null($data['fechaAprobadoUep']))
              {
               // dd('entre Aprobado CFI - UEP Null');
                  Session::flash('message-warning', 'Proyecto Aprobado por el CFI sin fecha de Aprobado UEP');
                  return redirect()->back();
                 
              }
              if(is_null($data['fechaAprobadoUep']))
              {
                  Session::flash('message-warning', 'Proyecto Aprobado por el CFI sin fecha de Aprobado UEP');
                  return redirect()->back();
              }
              if(is_null($data['fechaEnviadoCfi']))
              {
                  Session::flash('message-warning', 'Proyecto con Fecha de Aprobdo CFI sin fecha de Enviado al CFI');
                  return redirect()->back();
              }

              if(is_null($data['fechaEnvioBanco']))
              {
                  Session::flash('message-warning', 'Proyecto con Fecha de Aprobdo CFI sin fecha de Envio al Banco');
                  return redirect()->back();
              }

              if(is_null($data['fechaRespuestaBanco']))
              {
                  Session::flash('message-warning', 'Proyecto con Fecha de Aprobdo CFI sin fecha de Respuesta de Banco');
                  return redirect()->back();
              }
        }
        if ($data['fechaRespuestaBanco'] && is_null($data['fechaEnvioBanco']))
        {
            Session::flash('message-warning', 'Fecha Respuesta del Banco sin Fecha Envio Banco');
            return redirect()->back();

        }

        if ($data['fechaEfectivizacion'] && is_null($data['fechaDesembolso']))
        {
            Session::flash('message-warning', 'Falta Fecha Desembolso');
            return redirect()->back();

        }

        if ($data['fechaDesembolso'] && is_null($data['fechaAprobadoCfi']))
        {
            Session::flash('message-warning', 'Falta Fecha Aprobado por CFI');
            return redirect()->back();
        }
        if ($data['fechaAprobadoCfi'] && is_null($data['fechaEnviadoCfi']))
        {
            Session::flash('message-warning', 'Falta Fecha Enviado al CFI');
            return redirect()->back();
        }
        if ($data['fechaEnviadoCfi'] && is_null($data['fechaAprobadoUep']))
        {
            Session::flash('message-warning', 'Falta Fecha Aprobado por la UEP');
                return redirect()->back();
        }

        if (($data['fechaTramdispo'] OR $data['fechaComunicaTran'] OR $data['fechaDesembolso'] OR $data['fechaEfectivizacion']) && is_null($data['fechaAprobadoCfi']))
        {
            Session::flash('message-warning', 'Fecha Aprobado por CFI es NULO, en presencia de fechas posteriores');
            return redirect()->back();
        }


        if ($data['fechaAprobadoUep'])
        {
            if(is_null($data['fechaEnvioBanco']))
            {
                Session::flash('message-warning', 'Proyecto con Fecha de Aprobdo CFI sin fecha de Envio al Banco');
                return redirect()->back();
            }

            if(is_null($data['fechaRespuestaBanco']))
            {
                Session::flash('message-warning', 'Proyecto con Fecha de Aprobdo CFI sin fecha de Respuesta de Banco');
                return redirect()->back();
            }
            if(is_null($data['plazoGracia']) OR $data['plazoGracia'] < 0 )
            {
                Session::flash('message-warning', 'Proyecto con Fecha de Aprobdo CFI sin Plazo de Gracia');
                return redirect()->back();
            }
            if(is_null($data['plazoAmortizacion']) OR $data['plazoAmortizacion'] < 0 )
            {
                Session::flash('message-warning', 'Proyecto con Fecha de Aprobdo CFI sin Plazo de Amortizacion');
                return redirect()->back();
            }
        }

        if ($data['monto'] < 0 || $data['monto'] > 2500000)
        {
            Session::flash('message-warning', 'Monto Incorrecto');
            return redirect()->back();
        }
    


        /*******************************************************/
        /************** FIN DE COMPROBACIONES *****************/

        if($proyecto->fill($data)->update())
        {

            
            if ($proyectoRequest->hasfile('filename'))
            {
               
                
                foreach ($proyectoRequest->file('filename') as $key => $value)
                {
                    $extension = \File::extension($value->getClientOriginalName());
                    $imageName = $value->getClientOriginalName();
                    $value->move(public_path('upload/proyectos/' . str_slug($data['nombre'])), $data['nombre_archivo'] . '.' . $extension);
                    $url = 'upload/proyectos/' . str_slug($data['nombre']) . '/' . $data['nombre_archivo'] . '.' . $extension;

                    AnexoProyecto::create([
                        'proyecto_id' => $proyecto->id,
                        'user_id' => Auth::user()->id,
                        'file' => $url,
                        'icon' => $data['icon'],
                        'nombre_archivo' =>$data['nombre_archivo'],
                        'slug' =>str_slug($data['nombre_archivo']),
                        'descripcion' => $data['descripcion_archivo']
                    ]);
                }

            }

             Session::flash('message-success', 'Proyecto actualizado satisfactoriamente.');
             return redirect()->route('proyecto.index');
        }else{
            Session::flash('message-danger', 'Ocurrió un error al intentar guardar el Proyecto');
             return redirect()->route('proyecto.index');
        }
    }


    public function destroy(Proyecto $proyecto)
    {
        Proyecto::where('slug' , $proyecto->slug)->delete();
        Session::flash('message-danger', 'Proyecto eliminado satisfactoriamente.');
        return redirect()->route('proyecto.index');
    }



    private function comprobaciones($data)
    {

    }



    
}
