<?php

namespace App\Http\Controllers;

use App\Models\Empregador;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function createCandidato()
    {
        return view('user.candidatosRegister');
    }


    public function informacoesPessoais($id){
        $user=User::find($id);
        return view('user.editarPerfil',compact('user'));
    }



    public function loginCandidato(Request $request)
    {
        $input = new User;
        $input->email = $request->email;
        $input->password = $request->password;

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input->email, 'password' => $input->password))) {
            //if (auth()->user()->is_admin) {
            //    return redirect()->route('admin.home');
            //} else {
            echo "sessao iniciada";
            return redirect()->route('home');
            //}
        } else {
            echo "erro ao iniciar sessao";
            return redirect()->route('loginCandidato')->with('error','Email-Address And Password Are Wrong.');
        }
    }


    public function registerCandidato()
    {
        return view('auth/registerCandidato');
    }

    public function registerEmpregador()
    {
        return view('auth/registerEmpregador');
    }
}
