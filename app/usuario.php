<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ["id","persona_id","tipousu_id","name", "email", "password", "usu_estado"];

    protected $hidden = [
        'password'
    ];


    public function role(){
        return $this->belongsTo('App\tipo_usuario');
    }
    public function esAdmin(){
        if($this->tipousu_id==3){
            return true;
        }

        return false;

    }

    public function validarRuta(){
        $lista = date('Y-m-d');
        if (Auth::check()) {
            //$user= Auth::user();
            if (Auth::user()->tipousu_id==3) {
                return view('mantenimientos.mant_index', compact("lista"));
            } else {
                return view('vistas.index', compact("lista"));
            }
        }else{
            return view('vistas.index', compact("lista"));
        }
    }

    public function validarRutaBool(){
        if (Auth::check()) {
            $user= Auth::user();

                if ($user->esAdmin()) {
                    return true;
                } else {
                    return false;
                }
            } 
    }
     public function validarRutaBool2(){
        if (Auth::check()) {
                $user= Auth::user();
                if (Auth::user()->tipousu_id==3) {
                    return true;
                } else {
                    return false;
                }
            }else{
                 return view('vistas.index', compact("lista"));
            } 
    }



}
