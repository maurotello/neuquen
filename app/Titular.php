<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titular extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'titular';


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
      'apeynom',
      'fecha_nacimiento',
      'dni',
      'cuit',
      'domicilioLegal',
      'telefono',
      'mail',
      'estado_civil_id',
      'proyecto_id',
      'localidad_id',
      'apeynom_conyuge',
      'dni_conyuge',
      'telefono_conyuge',
      'cuit_conyuge',
      'fecha_nacimiento_conyuge',
      'descripcion',
      'user_id',
      'slug'
    ];
    /**
   * Normaliza y setea el nombre y el slug del Archivo
   *
   * @param $val
   */
    public function setApeynomAttribute($val)
    {
        $this->attributes['apeynom'] = trim($val);
        $this->attributes['slug'] = str_slug($val);
    }

    public function getApeynomAttribute()
    {
        return strtoupper($this->attributes['apeynom']);
    }

    /************ relaciones **************/

    public function localidad()
    {
        return $this->belongsTo('App\Localidad', 'localidad_id');
    }

    public function estadoCivil()
    {
        return $this->belongsTo('App\EstadoCivil', 'estado_civil_id');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'proyecto_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
