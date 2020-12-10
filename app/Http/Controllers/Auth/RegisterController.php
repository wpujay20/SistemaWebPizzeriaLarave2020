<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\tipo_usuario;
use App\persona;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'int', 'min:8'],
            'telefono' => ['required', 'int', 'min:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $persona = new persona();
        $persona->per_nombres = $data['name'];
        $persona->per_apellidos =  $data['apellido'];
        $persona->per_dni =  $data['dni'];
        $persona->per_telefono =  $data['telefono'];
        $persona->save();

        $ultimoId = persona::latest('persona_id')->first();
        $Id=  $ultimoId["persona_id"];


        return usuario::create([
            'persona_id'=>$Id,
            'tipousu_id'=>2,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'],),
            'usu_estado'=>'habilitado',
        ]);
    }
}
