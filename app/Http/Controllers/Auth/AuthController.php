<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Mail;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        date_default_timezone_set('America/Caracas');
        $validator = Validator::make($request->all(),[
            'name'      => 'required|min:3|max:18',
            'email'     => 'required|email|max:250|unique:users',
            'password'  => 'required|min:6|max:18|confirmed',
        ]);

        //Code de Activación
        $code = str_random(60);
        $name = $request->name;

        if($validator->fails())
        {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }else{

            $user = new User;
            $data['name'] = $user->name = $request->name;
            $data['email'] = $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $data['code'] = $user->code = $code;
            $user->role = 'user';
            $user->save();

            if($user)
            {
                // Envio de email
                Mail::send('emails.activate', ['data' => $data], function($message) use ($data)
                {
                    $message->to($data['email'], $data['name'])->subject('Activate your account');
                });

                return redirect('register')
                    ->with('message', 'Registro exitoso!');
            }   
        }
    }

    public function getActivate($code)
    {
        $user = User::where('code', '=', $code)->where('active', '=', 0);

        if($user->count())
        {
            $user = $user->first();

            // Update user to active state.

            $user->active   = 1;
            $user->code     = '';

            if($user->save())
            {
                return redirect('register')//OJO CAMBIAR CUANDO FUNCIONE LOGIN
                    ->with('message', 'Activated! You can now sign in!');
            }
        }

        return redirect('register')
            ->with('message', 'We could not activate your account. Try again later.');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        date_default_timezone_set('America/Caracas');

        if(Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password'],
            'active' => 1
        ], $request->has('remember')
        )){
            return redirect()->intended('/');
        }else{
            $validator = Validator::make($request->all(),[
                'email'     => 'required|email',
                'password'  => 'required',
            ]);
            if($validator->fails())
            {
                return redirect('login')
                ->withErrors($validator)
                ->withInput();
            }
           
            return redirect('login')
                ->with('message', 'Email/password wrong, or account not activated.');
           
        }        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
