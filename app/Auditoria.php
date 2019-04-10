<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
  /**
 * Setea la Tabla a la que pertenece el modelo
 *
 * @var string
 */
    protected $table = 'auditoria';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'user_id',
      'modelo',
      'fecha',
      'valor_anterior',
      'valor_actual',
      'slug',
    ];

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
     * Normaliza y setea el nombre y el slug del Articulo
     *
     * @param $val
     */
    public function setModeloAttribute($val)
    {
    //	setlocale(LC_TIME, 'es_ES.UTF-8');
        $this->attributes['modelo'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . '-'. rand(5,10);
    }
    public function user()
    {
        return $this->belongsTo('App\User');

    }

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
        */
    }

}
