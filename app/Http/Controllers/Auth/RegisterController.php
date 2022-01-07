<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Empregador;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isFalse;
use function PHPUnit\Framework\isTrue;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createCandidato(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'localidade' => $request['localidade'],
            'regiao' => $request['regiao'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_empregador' => 0,
        ]);
        return view('auth.login');
    }

    protected function createEmpregador(Request $request)
    {
        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required'
        );
        $input=$request->all();

        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {
            return redirect()->route('registerEmpregador')->with('error', 'Email introduzido já se econtra em uso.');
        } else {
            User::create([
                'companyName' => $request['companyName'],
                'localidade' => $request['sede'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'is_empregador' => 1,
            ]);
            return view('auth.login');
        }
    }
}
