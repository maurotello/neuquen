<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Movimiento extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'movimientos_proyectos';
    protected $dates = ['deleted_at'];


    /**
   * Get the route key for the model.
   *
   * @return string
   */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
   * Asignación masiva de atributos para la insecion
   *
   * @var array
   */
    protected $fillable = [
      'fecha',
      'descripcion',
      'proyecto_id',
      'user_id',
      'created_at',
      'slug'
    ];
    /**
   * Normaliza y setea el nombre y el slug del Archivo
   *
   * @param $val
   */
    public function setFechaAttribute($val)
    {
        $this->attributes['fecha'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . rand(1,1000);
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'proyecto_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

/*
    public static function boot(){

        parent::boot();

        static::creating(function($model)
        {
            $model->user_id = Auth::user()->id;
            //$model->nombre = "IPROSS-" . str_replace(["-","/"], "", $model->afiliado_id) . "/" . str_replace(["-",":"], "", \Carbon\Carbon::now()) ;
        });
/*
        static::updating(function($afiliado)
        {

            foreach ($afiliado->getDirty() as $key => $value) {
                $control = new Auditoria;
                $control->user_id = Auth::user()->id;
                $control->fecha = Carbon::now()->toDateTimeString();
                $control->motivo_cambio = '';
                $control->fila_id = $afiliado->id;
                $control->modelo = 'creditoAfiliado';
                $control->campo = $key;
                $control->valor_anterior = $afiliado->getOriginal($key);
                //$control->valor_actual = $value;
                $control->save();
            }


        });

    }
    */
}
