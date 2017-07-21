<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use SoftDeletes;
    
    protected $table='services';
    protected $fillable=[
       'name','description','price','duration','imageUrl'
       ];
       
    protected $dates = ['deleted_at'];

}
