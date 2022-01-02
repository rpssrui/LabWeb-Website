<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function contactPost(Request $request){
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email',
                        'info' => 'required'
                ]);

        Mail::send('email', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'info' => $request->get('info') ,
                'emailEmpresa'=>$request->get('emailEmpresa')],
                
                function ($message) {
                        $message->from('from@example.com');
                        $message->to('empresa@email.com')
                                ->subject('Um candidato está interessado no seu anuncio de trabalho');
        });

        return back()->with('success', 'Email enviado com Sucesso!');

    }
}
