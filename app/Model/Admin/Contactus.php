<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $fillable = [ 'address' ,
            'email',
            'phone'  ,
            'facebook' ,
            'twitter' ,
            'youtube',
            'instagram',
            'description'];

}
