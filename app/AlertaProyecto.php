<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;

class AlertaProyecto extends Model
{
    protected $table = 'alerta_proyecto';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'proyecto_id',
        'alerta_id',
        'slug'
    ];

/*
    public function setNombreAttribute($val)
    {
        $this->attributes['nombre'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . rand(1,10000);
    }
*/
/*
    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }
*/
}
