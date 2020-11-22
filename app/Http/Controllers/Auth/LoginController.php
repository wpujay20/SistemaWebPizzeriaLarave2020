<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Enum\StatusUser;
use Date;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $maxAttempts = 3;// cantidad máxima de intentos
    protected $timeLocked = 5;// tiempo de bloqueo para el usuario
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function showLoginForm()
    {
        return view('vistas.vista_login');
    }
    
    public function username()
    {
        return 'username';
    }
    
    protected function credentials(Request $request)
    {
        return [$this->username() => $request->{$this->username()}, 'password' => $request->password];
    }
    
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $this->maxAttempts, $this->timeLocked
        );
    }
    
    public function logout(Request $request) {
        Auth::logout();
            return redirect('/login');
    }
    
    public function redirectTo()
    {  
        return auth()->user()->is_administrador ? '/mantenimientos' : '/';
            
    }
    
}