<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
Use Caffeinated\Shinobi\Models\Role;
use App\User;
use Illuminate\Foundation\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    --------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('auth.login');
    }
    public function authenticated(Request $request, $user)
    {
        //Un usuario debe tener un rol en el sistema para poder acceder a este
        $roles = $user->roles()->get();
        if($roles->isNotEmpty()){
            $user->setSession($roles ->toArray());
            
        }else{
            $this ->guard()->logout();
            $request->session()->invalidate();
            return redirect('login')->withErrors([
                'Error' => 'Este usuario no tiene un rol activo']);
        }
    }
    public function username(){
        return 'name';
    }
}
