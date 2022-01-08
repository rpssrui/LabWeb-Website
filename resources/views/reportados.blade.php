@extends ('layouts\app')

@section('title')
Anúncios Reportados
@endsection


@section('content')

@if($message=Session::get('error'))
<div class="alert alert-danger">
    <p>{{$message}}</p>
</div>
@endif
<div class="container">
    <div class="row">
        <h1>Anúncios Reportados</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h5 class="panel-title">Apenas anúncios com 2 ou mais reports</h5>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Tipo</th>
                                <th>Eliminar Anúncio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anuncios as $add)
                            <tr>
                                <td align="center">{{$add->titulo}}</td>
                                <td align="center">{{$add->created_at}}</td>
                                <td align="center">{{$add->tipo}}</td>
                                <td align="center">
                                    <a href="anuncios/delete/{{$add->id}}" class="btn btn-danger" onclick="return confirm('Tem a certeza que pretende apagar este Anuncio?');"><em class="fa fa-trash"></em></a>
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