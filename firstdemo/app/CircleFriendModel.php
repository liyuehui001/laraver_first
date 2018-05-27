<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CircleFriendModel extends Model
{
    //
    protected $table='friend_circle';
    protected $primaryKey='id';
    public $timestamps = false;
}
