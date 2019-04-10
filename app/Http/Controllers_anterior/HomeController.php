<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;
use App\Proyecto;
use App\AlertaProyecto;
use App\Alerta;
use App\Profile;
use App\Localidad;
use App\Departamento;
use App\Estado;
use App\Sector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    
    public function informeEstados()
    {
        $proyectos = Proyecto::all();

        $estado_aprobado_cfi = Estado::where('nombre','APROBADO CFI')->first();
        $estado_uep =          Estado::where('nombre','UEP')->first();
        $estado_cfi =          Estado::where('nombre','CFI')->first();
        $estado_cancelado =    Estado::where('nombre','CANCELADO')->first();
        $estado_archivado =    Estado::where('nombre','ARCHIVADO')->first();
        $estado_judicial =     Estado::where('nombre','GESTION JUDICIAL')->first();
        $estado_des =          Estado::where('nombre','DESEMBOLSADO')->first();
        $estado_titular =      Estado::where('nombre','TITULAR')->first();
        $estado_bco =          Estado::where('nombre','BANCO')->first();
        $estado_efec =         Estado::where('nombre','EFECTIVIZADO')->first();



        $proyectos_aprobado_cfi = Proyecto::where('estado_id', $estado_aprobado_cfi['id'])->count();
        $proyectos_en_uep =       Proyecto::where('estado_id', $estado_uep['id'])->count();
        $proyectos_judicial =     Proyecto::where('estado_id', $estado_judicial['id'])->count();
        $proyectos_cfi =          Proyecto::where('estado_id', $estado_cfi['id'])->count();
        $proyectos_cancelado =    Proyecto::where('estado_id', $estado_cancelado['id'])->count();
        $proyectos_archivado =    Proyecto::where('estado_id', $estado_archivado['id'])->count();
        $proyectos_des =          Proyecto::where('estado_id', $estado_des['id'])->count();
        $proyectos_titular =      Proyecto::where('estado_id', $estado_titular['id'])->count();
        $proyectos_bco =          Proyecto::where('estado_id', $estado_bco['id'])->count();
        $proyectos_efec =         Proyecto::where('estado_id', $estado_efec['id'])->count();

        $proyectos = Proyecto::all();

        return view('informes.primero', [
            'p_aprobado_cfi' => $proyectos_aprobado_cfi,
            'p_en_uep' => $proyectos_en_uep,
            'p_judicial' => $proyectos_judicial,
            'p_cfi' => $proyectos_cfi,
            'p_cancelado' => $proyectos_cancelado,
            'p_archivado' => $proyectos_archivado,
            'p_des' => $proyectos_des,
            'p_titular' => $proyectos_titular,
            'p_bco' => $proyectos_bco,
            'p_efec' => $proyectos_efec,
            'proyectos' => $proyectos

        ]);
    }


    public function informeLocalidades()
    {
        $localidades = Localidad::all();
        $cant = Localidad::count();


        foreach ($localidades as $key => $value) {
            //echo '$proyectos_' . str_slug($value->nombre);

        }

        return view('informes.localidades', [
           'localidades' => $localidades,
           'cant'        => $cant

        ]);
        
    }

    public function informeSectores()
    {
        $sectores = Sector::all();
        $cant = Sector::count();


        foreach ($sectores as $key => $value) {
            //echo '$proyectos_' . str_slug($value->nombre);

        }

        return view('informes.sectores', [
           'sectores' => $sectores,
           'cant'        => $cant

        ]);
        
    }



    public function informeDptos()
    {
        $dptos = Departamento::all();
        $cant = Departamento::count();


        foreach ($departamentos as $key => $value) {
            //echo '$proyectos_' . str_slug($value->nombre);

        }

        return view('informes.departamentos', [
           'dptos' => $dptos,
           'cant'  => $cant

        ]);
        
    }


    public function index()
    {

        $perfil = Profile::where('user_id', Auth::user()->id)->count();
        //dd($perfil);
        if ($perfil == 0){
            Profile::create([
                'user_id' =>  Auth::user()->id,
                'apellido' => Auth::user()->name,
            ]);
        }


        AlertaProyecto::whereNotNull('id')->delete();

        $alertas = Alerta::all();


        foreach ($alertas as $alerta)
        {
            if ($alerta->codigo == 'Amortizando' AND $alerta->estado = "activa")
            {
                $date = \Carbon\Carbon::now();
                $meses = $date->subMonths($alerta->dias);
                $sql = Proyecto::whereHas('estado', function ($query) {
                        $query->where('nombre', 'like', "%EFECTIVIZADO%");
                    })
                    ->where('fechaEfectivizacion', '<', \Carbon\Carbon::parse($meses)->format('Y-m-d'))
                    ->get();
                
            }
            if ($alerta->codigo == 'Ingreso' AND $alerta->estado = "activa")
            {
                $sql = Proyecto::whereHas('estado', function ($query) {
                        $query->where('nombre', 'like', "%UEP%");
                    })
                    ->where('fechaIngreso', '<', \Carbon\Carbon::now()->subDays($alerta->dias))
                    ->get();
            }

            if ($alerta->codigo == 'BancoSujeto' AND $alerta->estado = "activa")
            {
                $sql = Proyecto::whereHas('estado', function ($query) {
                        $query->where('nombre', 'like', "%BANCO%");
                    })
                    ->where('fechaEnvioBanco', '<', \Carbon\Carbon::now()->subDays($alerta->dias))
                    ->get();
            }
            if ($alerta->codigo == 'SujetoUep' AND $alerta->estado = "activa")
            {
                $sql = Proyecto::whereHas('estado', function ($query) {
                        $query->where('nombre', 'like', "%UEP%");
                    })
                    ->where('fechaRespuestaBanco', '<', \Carbon\Carbon::now()->subDays($alerta->dias))
                    ->get();
            }


            if ($sql)
            {
                foreach ($sql as $p) {
                    $nueva = new AlertaProyecto;
                    $nueva->proyecto_id = $p->id;
                    $nueva->alerta_id = $alerta->id;
                    $nueva->slug = 'alerta-' . $alerta->id . '-' . rand(1,10000);
                    if ($nueva->save())
                    {
                        $proyecto = Proyecto::find($p->id);
                        $proyecto->update([
                            'color' => $alerta->color
                        ]);
                    }
                }
            }
        }

        $alerta_proyectos    = DB::select("SELECT ap.*, a.*, p.* FROM alerta_proyecto ap, alertas a, proyectos p WHERE ap.alerta_id = a.id AND ap.proyecto_id = p.id");

        //dd($alerta_proyectos);

        $estado_aprobado_cfi = Estado::where('nombre','APROBADO CFI')->first();
        $estado_uep =          Estado::where('nombre','UEP')->first();
        $estado_cfi =          Estado::where('nombre','CFI')->first();
        $estado_cancelado =    Estado::where('nombre','CANCELADO')->first();
        $estado_archivado =    Estado::where('nombre','ARCHIVADO')->first();
        $estado_judicial =     Estado::where('nombre','GESTION JUDICIAL')->first();
        $estado_des =          Estado::where('nombre','DESEMBOLSADO')->first();
        $estado_titular =      Estado::where('nombre','TITULAR')->first();
        $estado_bco =          Estado::where('nombre','BANCO')->first();
        $estado_efec =         Estado::where('nombre','EFECTIVIZADO')->first();



        $proyectos_aprobado_cfi = Proyecto::where('estado_id', $estado_aprobado_cfi['id'])->count();
        $proyectos_en_uep =       Proyecto::where('estado_id', $estado_uep['id'])->count();
        $proyectos_judicial =     Proyecto::where('estado_id', $estado_judicial['id'])->count();
        $proyectos_cfi =          Proyecto::where('estado_id', $estado_cfi['id'])->count();
        $proyectos_cancelado =    Proyecto::where('estado_id', $estado_cancelado['id'])->count();
        $proyectos_archivado =    Proyecto::where('estado_id', $estado_archivado['id'])->count();
        $proyectos_des =          Proyecto::where('estado_id', $estado_des['id'])->count();
        $proyectos_titular =      Proyecto::where('estado_id', $estado_titular['id'])->count();
        $proyectos_bco =          Proyecto::where('estado_id', $estado_bco['id'])->count();
        $proyectos_efec =         Proyecto::where('estado_id', $estado_efec['id'])->count();

        $proyectos = Proyecto::all();

        return view('adminlte::home', [
            'p_aprobado_cfi' => $proyectos_aprobado_cfi,
            'p_en_uep' => $proyectos_en_uep,
            'p_judicial' => $proyectos_judicial,
            'p_cfi' => $proyectos_cfi,
            'p_cancelado' => $proyectos_cancelado,
            'p_archivado' => $proyectos_archivado,
            'p_des' => $proyectos_des,
            'p_titular' => $proyectos_titular,
            'p_bco' => $proyectos_bco,
            'alerta_proyectos' =>$alerta_proyectos,
            'p_efec' => $proyectos_efec,

        ]);
    }
}
