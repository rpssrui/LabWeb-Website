<html lang="en">

<head>
    <title>@yield('title','Jobs RUs')</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
</head>

<body style="background-image: url('https://images.pexels.com/photos/7233126/pexels-photo-7233126.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a href="/" class="navbar-brand">Home</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <a href="team" class="nav-item active nav-link">Quem somos</a>
            </ul>
            <!--lOGIN EMPREGADORES -->
            @guest

            @if (Route::has('login'))
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EmpregadoresLogin" style="position:absolute; right:130px;">
                Empregadores
            </button>
            <div class="modal fade" id="EmpregadoresLogin" tabindex="-1" role="dialog" aria-labelledby="EmpregadoresLogin" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EmpregadoresLogin">Empregadores</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            O que pretende fazer?
                        </div>
                        <div class="modal-footer">
                            <form method="get" action="{{url('/registerEmpregador')}}">
                                <button style="margin-top:16px" type="submit" class="btn btn-primary" name="registerEmpregador">Registe-se</button>
                            </form>
                            <a class="btn btn-primary" href="{{ url('/login') }}">{{ __('Login') }}</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!--LOGIN CANDIDATOS -->
        @if (Route::has('login'))
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CandidatosLogin">
            Candidatos
        </button>

        <div class="modal fade" id="CandidatosLogin" tabindex="-1" role="dialog" aria-labelledby="CandidatosLogin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CandidatosLogin">Candidatos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        O que pretende fazer?
                    </div>
                    <div class="modal-footer">
                        <form method="get" action="{{url('/registerCandidato')}}">
                            <button style="margin-top:16px" type="submit" class="btn btn-primary" name="registerCandidato">Registe-se</button>
                        </form>
                        <a class="btn btn-primary" href="{{ url('/login') }}">{{ __('Login') }}</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>

            </div>
            @endif
            @else
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->firstName}} {{Auth::user()->lastName}} {{Auth::user()->companyName}}
                </button>
                @if(Auth::user()->is_empregador)
                <!--CONTA EMPREGADOR-->
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('/criarAnuncio') }}" onclick="event.preventDefault();
                                                     document.getElementById('createAnuncio-form').submit();">
                        {{ __('Criar Anuncio') }}
                    </a>
                    <form id="createAnuncio-form" action="{{ url('/criarAnuncio') }}" method="get" class="d-none">
                        @csrf
                    </form>

                    <a class="dropdown-item" href="{{ url('/meusAnuncios') }}" onclick="event.preventDefault();
                                                     document.getElementById('meusAnuncios-form').submit();">
                        {{ __('Meus Anuncios') }}
                    </a>
                    <form id="meusAnuncios-form" action="{{ url('/meusAnuncios') }}" method="get" class="d-none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!-- CONTA ADMIN-->
                    @elseif (Auth::user()->is_admin)
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- Informações pessoais-->
                        <a class="dropdown-item" href="/informacoesPessoais/{{Auth::user()->id}}"  >
                            {{ __('Informações Pesoais') }}
                        </a>
                        </form>
                        <!-- Logout-->
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{ route('reports') }}" onclick="event.preventDefault();
                                                     document.getElementById('reports-form').submit();">
                            {{ __('Reports') }}
                        </a>
                        <form id="reports-form" action="{{ route('reports') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    <!-- CONTA CANDIDATO -->
                    @else    
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- Informações pessoais-->
                        <a class="dropdown-item" href="/informacoesPessoais/{{Auth::user()->id}}"  >
                            {{ __('Informações Pesoais') }}
                        </a>
                        </form>
                        <!-- Logout-->
                        <a class="dropdown-item" href="{{ route('reports') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('reports') }}" method="POST" class="d-none">
                            @csrf
                    @endif
                    </div>
                </div>
                @endguest
    </nav>
    <main class="container mt-4">
        @yield('content')
    </main>
    @include('includes/footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>   
</body>

</html>