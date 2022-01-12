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
    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_if_stores_new_Empregador(){ //registo empregador
        $response=$this->post('createEmpregador',[
            'companyName'=>'Pingo Doce',
            'email'=>'pingoDoce@gmail.com',
            'sede'=>'Porto',
            'password'=>'pingoDoce',
            'password_confirmation'=>'pingoDoce',
        ]);
        $response->assertRedirect('/login');
    }

    public function test_if_login_User(){ //login empregador
        $response=$this->post('login',[
            'email'=>'pingoDoce@gmail.com',
            'password'=>'pingoDoce',
        ]);
        $response->assertRedirect('/home');
    }

    public function test_if_stores_Anuncio()
    {
        $response=$this->post('login',[
            'email'=>'pingoDoce@gmail.com',
            'password'=>'pingoDoce',
        ]);
        
        $response=$this->post('createAnuncio',[
            'titulo'=>'titulo',
            'descricao'=>'descricao',
            'tipo'=>'Emprego',
            'regiao'=>'porto',
            'localidade'=>'porto',
            'contactos'=>'www.site.com',
            'habilitacoesMinimas'=>'4ano',
            'setorAtividade'=>'porto',
        ]);
        $response->assertRedirect('/meusAnuncios');
    }

    public function test_if_shows_meusAnuncios(){
        $response=$this->post('/meusAnuncios');
        $response->assertRedirect('/meusAnuncios');
    }

}
