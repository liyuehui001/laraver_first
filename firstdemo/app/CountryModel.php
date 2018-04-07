<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    //
    protected $table='country';
    protected $primaryKey='id';
    public $timestamps = false;
}
