<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'sucursales';


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
      'banco_id',
      'user_id',
      'localidad_id',
      'nombre',
      'direccion',
      'telefono',
      'email',
      'contacto',
      'gerente',
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

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }

    /**
     * Retorna la Provincia a la que pertenece la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banco()
    {
        return $this->belongsTo('App\Banco', 'banco_id');
    }

    /**
     * Retorna el Codigo Postal de la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function localidad()
    {
        return $this->belongsTo('App\Localidad', 'localidad_id');
    }

    /**
     * Retorna el Codigo Postal de la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
