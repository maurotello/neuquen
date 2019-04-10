<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;

class Refinanciacion extends Model
{
      /**
       * Setea la Tabla a la que pertenece el modelo
       *
       * @var string
       */
      protected $table = 'refinanciaciones';
      //protected $dates = ['deleted_at'];

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
          'montoRefinanciar',
          'nroResolucion',
          'plazoGracia',
          'plazoAmortizacion',
          'tasa',
          'descripcion',
          'proyecto_id',
          'user_id',
          'slug'
      ];
      /**
     * Normaliza y setea el nombre y el slug del Archivo
     *
     * @param $val
     */
      public function setFechaAttribute($val)
      {
          $this->attributes['fecha'] = $val;
          $this->attributes['slug'] = str_slug($val) . '_' . $this->attributes['proyecto_id'] . '_' . rand(5,10);
      }

      public function proyecto()
      {
          return $this->belongsTo('App\Proyecto', 'proyecto_id');
      }

      public function user()
      {
          return $this->belongsTo('App\User', 'user_id');
      }

      public static function evaluarRefinanciacion($proyecto)
      {
        if (is_null($proyecto->fechaEfectivizacion))
          return false;
        if (is_null($proyecto->fechaDesembolso))
          return false;
        if (!(is_null($proyecto->fechaDesistido)))
          return false;
        if (!(is_null($proyecto->fechaCancelado)))
          return false;
        if (!(is_null($proyecto->fechaArchivado)))
          return false;
        if($proyecto->estado->nombre != 'AMORTIZANDO')
          return false;

        return true;
      }

}
