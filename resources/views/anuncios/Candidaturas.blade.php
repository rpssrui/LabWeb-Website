@extends ('layouts\app')

@section('title')
Candidaturas
@endsection

@section('content')


<div class="container">
    <div class="row">
        <h1>{{Auth::user()->companyName}}</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h5 class="panel-title">Respostas aos Anúncios:</h5>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                <table class="table table-secondary">
                <caption>tavbela das candidaturas</caption>
                        <thead class="thead thead-dark">
                            <tr>
                                <th id="nome">Nome do Candidato</th>
                                <th id="email">Email do Candidato</th>
                                <th id="data">Data de Envio</th>
                                <th id="mensagem">Mensagem</th>
                                <th id="curriculo">Curriculo</th>
                                <th id="botao responde">Responder</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidaturas as $candidatura)
                            <tr>
                                <td align="center">
                                    <a href="/user/{{$candidatura->idCandidato}}" class="btn btn-default">{{$candidatura->nomeCandidato}}</a>
                                </td>
                                <td align="center">{{$candidatura->emailCandidato}}</td>
                                <td align="center">{{$candidatura->created_at}}</td>
                                <td align="center">{{$candidatura->mensagem}}</td>
                                <td align="center">
                                    <a href="/Curriculo/{{$candidatura->id}}" class="btn btn-default"><em class=" fa fa-cloud-download"></em></a>
                                </td>
                                <td align="center">
                                    <a href="/resposta/{{$candidatura->id}}" class="btn btn-default"><em class="fa fa-envelope"></em></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-4">Page 1 of 5
                        </div>
                        <div class="col col-xs-8">
                            <ul class="pagination hidden-xs pull-right">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                            <ul class="pagination visible-xs pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection