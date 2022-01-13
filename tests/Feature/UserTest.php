<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_if_stores_new_Empregador()
    { //registo empregador
        $response = $this->post('createEmpregador', [
            'companyName' => 'Pingo Doce',
            'email' => 'pingoDoce@gmail.com',
            'sede' => 'Porto',
            'password' => 'pingoDoce',
            'password_confirmation' => 'pingoDoce',
        ]);
        $response->assertRedirect('/login');
    }

    public function test_if_login_Empregador()
    { //login empregador
        $response = $this->post('login', [
            'email' => 'pingoDoce@gmail.com',
            'password' => 'pingoDoce',
        ]);
        $response->assertRedirect('/home');
    }

    public function test_if_stores_candidato()
    {
        $response = $this->post('createCandidato', [
            'firstName' => 'Paulo',
            'lastName' => 'Seixo',
            'email' => 'seixoPaulo@gmail.com',
            'regiao' => 'Porto',
            'localidade' => 'Porto',
            'password' => 'seixoPaulo',
            'password_confirmation' => 'seixoPaulo',
        ]);
        $response->assertRedirect('/login');
    }


    public function test_if_login_Candidato()
    { //login candidato
        $response = $this->post('login', [
            'email' => 'seixoPaulo@gmail.com',
            'password' => 'seixoPaulo',
        ]);
        $response->assertRedirect('/home');
    }

    public function test_if_stores_Anuncio()
    {
        $response = $this->post('login', [
            'email' => 'pingoDoce@gmail.com',
            'password' => 'pingoDoce',
        ]);

        $response = $this->post('createAnuncio', [
            'titulo' => 'titulo',
            'descricao' => 'descricao',
            'tipo' => 'Emprego',
            'regiao' => 'porto',
            'localidade' => 'porto',
            'contactos' => 'www.site.com',
            'habilitacoesMinimas' => '4ano',
            'setorAtividade' => 'porto',
        ]);
        $response->assertRedirect('/meusAnuncios');
    }

    public function test_if_stores_personalInfo()
    {   

        $response = $this->post('login', [
            'email' => 'seixoPaulo@gmail.com',
            'password' => 'pingoDoce',
        ]);

        $response = $this->get('/informacoesPessoais/7', [
            'localidade' => 'Porto',
            'descricao' => 'Olá sou o Paulo Seixo!',
            'date_of_birth' => '1999-03-12',
            'regiao' => 'Porto',
        ]);
            
        $response->assertRedirect('user',7);
    }
    
}
