<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ["id","persona_id","tipousu_id","name", "email", "password", "usu_estado"];

    protected $hidden = [
        'password'
    ];

}
