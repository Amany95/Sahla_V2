<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Client extends Model
{
	//use Notification;

    protected $table = 'clients';
    public $fillable = ['name','description'];
}
