<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'localidades';
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
        'cp', 
        'zona_id',
        'dpto_id', 
        'provincia_id', 
        'user_id',
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
    public function provincia()
    {
        return $this->belongsTo('App\Provincia', 'provincia_id');
    }

    /**
     * Retorna el Codigo Postal de la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zona()
    {
        return $this->belongsTo('App\Zona', 'zona_id');
    }

    public function dpto()
    {
        return $this->belongsTo('App\Departamento', 'dpto_id');
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
