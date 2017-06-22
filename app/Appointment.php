<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'appointments';

     //title=Reservado + "Nombre Servicio"
     //start
     //end
     //color
     //userId
    protected $fillable = [
        'title', 'start', 'end', 'color', 'userId','serviceId'
    ];
    //protected $dates = ['start', 'end'];

}
