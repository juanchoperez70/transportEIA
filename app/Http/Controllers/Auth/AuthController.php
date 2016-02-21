<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Session\Store as Session;

class AuthController extends Controller {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    private $session;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Guard  $auth
     * @param  Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Session $session) {
        $this->auth = $auth;
        $this->session = $session;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin() {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            $this->session->flash('message', "Ha iniciado sesión con éxito");
            $this->session->flash('alert-class', 'alert-success');

            return redirect()->intended($this->redirectPath());
        }

        return redirect('/auth/login')
                        ->withInput($request->only('email'))
                        ->withErrors([
                            'email' => 'Estas credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout() {
        $this->auth->logout();
        $this->session->flash('message', "Ha cerrado sesión con éxito");
        $this->session->flash('alert-class', 'alert-danger');
        return redirect('/');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath() {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

}
