<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // $email = $user->email;
        // $password = $user->password;

        // if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1])) {
        //     return view('pages.home');
        // }

        // $test = Auth::user()->is_active;

        // dd($test);

        // $userdata = array(
        //     'email' => $request->email,
        //     'password' => $request->password,
        // );

        // if (Auth::attempt($userdata)) {
        //     if (Auth::user()->is_active == true){
        //         return redirect()->route('home')->with('Sukses', 'Selamat Datang');
        //     }else{
        //         return back()->with('Maaf','Akun sudah tidak aktif');
        //     }
        // } else {
        //     return back()->with('Aduh','Email/Passwor salah');
        // }
    }
}
