<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columnasview extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'columnasview';
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
        'nombre',
        'descripcion',
        'orden',
        'seleccionada',
        'slug'
    ];
    /**
   * Normaliza y setea el nombre y el slug del Archivo
   *
   * @param $val
   */
    public function setNombreAttribute($val)
    {
        $this->attributes['nombre'] = trim($val);
        $this->attributes['slug'] = str_slug($val);
    }

    
}