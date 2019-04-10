<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;

class Alerta extends Model
{
    protected $table = 'alertas';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'nombre',
        'mensaje',
        'estado',
        'codigo',
        'color',
        'sql',
        'dias',
        'slug'
    ];

    public function setNombreAttribute($val)
    {
        $this->attributes['nombre'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . rand(1,10000);
    }

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }

}
