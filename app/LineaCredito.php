<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaCredito extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'lineas_creditos';
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
            'monto_maximo',
            'gracia_maximo',
            'amortizacion_maximo',
            'tasa',
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
     * Retorna el Codigo Postal de la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
