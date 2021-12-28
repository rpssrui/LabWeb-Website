@extends ('layouts\app')

@section('title')
Meus Anuncios
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
                            <h5 class="panel-title">Meus Anuncios</h5>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($anuncios as $add)
                            <tr>
                                <td align="center">
                                    <a href="anuncios/edit/{{$add->id}}" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                    <a href="anuncios/delete/{{$add->id}}" class="btn btn-danger" onclick="return confirm('Tem a certeza que pretende apagar este Anuncio?');"><em class="fa fa-trash"></em></a>
                                </td>
                                <td>{{$add->titulo}}</td>
                                <td>{{$add->created_at}}</td>
                                <td>{{$add->tipo}}</td>
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