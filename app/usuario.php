<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usuario extends Authenticatable
{   
    use Notifiable;
    
    protected $primaryKey = 'id';
    protected $fillable = ["id","persona_id","tipousu_id", "username", "password", "usu_estado"];
    
    protected $hidden = [
        'password'
    ];
        
}
