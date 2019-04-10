<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnexoProyecto extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'anexos_proyectos';
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
        'user_id',
        'proyecto_id',
        'file',
        'icon',
        'nombre_archivo',
        'slug'
    ];
    /**
   * Normaliza y setea el nombre y el slug del Archivo
   *
   * @param $val
   */
    public function setNombreAttribute($val)
    {
        $this->attributes['nombre'] = time() . trim($val);
        $slug1 = time() . $val;
        $this->attributes['slug'] = str_slug($slug1);
    }

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }
}
