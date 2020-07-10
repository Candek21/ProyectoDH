<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public $table= "movies";
    //public $primarykey= "id";
    //public $timestrap= false;
    public $guarded=[];
}
