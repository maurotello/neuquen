<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;

class Banco extends Model
{
    protected $table = 'bancos';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = ['nombre', 'slug'];

    public function setNombreAttribute($val)
    {
        $this->attributes['nombre'] = trim($val);
        $this->attributes['slug'] = str_slug($val);
    }

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }

}
