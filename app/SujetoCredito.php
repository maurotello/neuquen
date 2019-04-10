<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SujetoCredito extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'sujeto_credito';


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
      'proyecto_id',
      'user_id',
      'sucursal_id',
      'fecha_envio_banco',
      'fecha_respuesta_banco',
      'sujeto_credito',
      'descripcion',
      'slug'
    ];
    /**
   * Normaliza y setea el nombre y el slug del Archivo
   *
   * @param $val
   */
    public function setSujetoCreditoAttribute($val)
    {
        $this->attributes['sujeto_credito'] = trim($val);
        //$this->attributes['slug'] = str_slug($val) . "-" . $this->attributes['proyecto_id'] . "-" . $this->attributes['sucursal_id'] . "-" . rand(5,10);
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'proyecto_id');
    }

    /**
     * Retorna el Codigo Postal de la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal', 'sucursal_id');
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
