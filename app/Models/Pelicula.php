<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $connection='peliculas';
    protected $table='pelicula';
    protected $primaryKey = "idPelicula";
    public $timestamps=false;
}
