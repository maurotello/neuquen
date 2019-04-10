<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'proyectos';


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
      'fechaIngreso',
      'nombre',
      'numeroInterno',
      'numeroCfi',
      'localidad_id',
      'lineaCredito_id',
      'estado_id',
      'estadoInterno_id',
      'sector_id',
      'monto',
      'tipo',
      'domicilioProyecto',
      'domicilioLegal',
      'telefono',
      'email',
      'web',
      'tamanio',
      'productos',
      'ciuu',
      'mo',
      'enuep',
      'descripcion',
      'inversionTotal',
      'inversionRealizada',
      'inversionARealizar_af',
      'inversionARealizar_ct',
      'figuraLegal_id',
      'periodicidad_id',
      'destinoCredito_id',
      'plazoGracia',
      'plazoAmortizacion',
      'cantidadDesembolsos',
      'tasa',
      'garantia_id',
      'sucursal_id',
      'descripcionGarantia',
      'fechaCaducoBanco',
      'fechaAprobadoUep',
      'fechaEnviadoCfi',
      'fechaAprobadoCfi', // REMIRESol
      'fechaTramdispo',
      'fechaComunicaTran',
      'fechaDesembolso',
      'fechaEfectivizacion',
      'fechaDesistido',
      'fechaJudicial',
      'fechaCancelado',
      'fechaArchivado',
      'fechaEnvioBanco',
      'fechaRespuestaBanco',
      'fechaUltimoMovimiento',
      'refinanciado',
      'user_id',
      'titular',
      'observaciones',
      'color',
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
    public function localidad()
    {
        return $this->belongsTo('App\Localidad', 'localidad_id');
    }

    /**
     * Retorna el Codigo Postal de la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lineaCredito()
    {
        return $this->belongsTo('App\LineaCredito', 'lineaCredito_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado', 'estado_id');
    }

    public function estadoInterno()
    {
        return $this->belongsTo('App\EstadoInterno', 'estadoInterno_id');
    }

    public function sector()
    {
        return $this->belongsTo('App\Sector', 'sector_id');
    }

    public function figuraLegal()
    {
        return $this->belongsTo('App\FiguraLegal', 'figuraLegal_id');
    }

    public function periodicidad()
    {
        return $this->belongsTo('App\Periodicidad', 'periodicidad_id');
    }

    public function destinoCredito()
    {
        return $this->belongsTo('App\DestinoCredito', 'destinoCredito_id');
    }

    public function garantia()
    {
        return $this->belongsTo('App\Garantia', 'garantia_id');
    }

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
