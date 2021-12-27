<?php

namespace App\Http\Controllers;

use App\Models\Empregador;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::all();
        $user = user::paginate(2);
        return view('user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCandidato()
    {
        return view('user.candidatosRegister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
        ]);

        $user->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/');
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
