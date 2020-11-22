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
    
    public function tipo(){
        return $this->hasOne(tipo_usuario::getClass(), 'tipousu_id', 'tipousu_id');
    }
    
    public function getIsClienteAttribute()
    {
        return $this->tipo->tipousu_id == 2 ? true : false;
    }
    
    public function getIsAdministradorAttribute()
    {
        return $this->tipo->tipousu_id == 3 ? true : false;
    }
        
}
