<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Anuncio;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\defaultMail;

use App\Models\Candidatura;
use App\Models\Resposta;

class MailController extends Controller
{
        public function contactPost(Request $request, $id)
        {
                $candidatura = Candidatura::find($id)->firstorfail();
                $anuncio = Anuncio::find($candidatura->idAnuncio)->firstorfail();
                $empresa = User::find($anuncio->idEmpresa)->firstorfail();

                Resposta::create([
                        'resposta' => $request->mensagem,
                        'idCandidatura' => $candidatura->id
                ]);

                $data = array(
                        "body" => $request->mensagem,
                        "subject" => $request->subject,
                        "emailContacto" => $request->txtEmail,
                        "nomeEmpresa" => $empresa->companyName,
                );

                if ($request->Sim) {
                        Mail::to($candidatura->emailCandidato)
                                ->send(new defaultMail($data));

                        return back()->with('success', 'Email enviado com Sucesso!');
                } 
                 return back()->with('success', 'Resposta enviada com Sucesso, pode ainda responder novamente através do email');
        }
}
