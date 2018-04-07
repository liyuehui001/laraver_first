<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchRecordModel extends Model
{
    //
    protected $table='search_record';
    protected $primaryKey='id';
    public $timestamps = false;
}
