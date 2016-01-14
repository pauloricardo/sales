@extends('app')

@section('content')
    <h1 class="page-header">Clientes</h1>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <a href="{{route('admin.clients.create')}}" class="btn btn-danger left" style="margin-right:15px;">Cadastrar Cliente</a>
                <a href="javascript:;" class="btn btn-info left filter-btn" target="__blank">Filtrar</a>
                <div class="clearfix"></div>
            </div>
            <div class="filter-fields well well-lg">
                {!! Form::open(['method'=>'post', 'route'=>'admin.clients.index', 'class'=>'form form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome: ',['class'=>'col-md-1']) !!}
                    <div class="col-md-3">
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail: ',['class'=>'col-md-1']) !!}
                    <div class="col-md-3">
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('Filtrar', ['class'=>'btn btn-default']) !!}
                <a href="{{route('admin.clients.index')}}" class="btn btn-info">Limpar</a>
                {!! Form::close() !!}

            </div>
            <br><br>
            <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->user->name}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->user->email}}</td>
                        <td>
                            <a href="{{route('admin.clients.show', ['id'=>$client->id])}}"
                               class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{route('admin.clients.edit', ['id'=>$client->id])}}"
                               class="btn btn-sm btn-default">Editar</a>
                            <a href="{{route('admin.clients.delete', ['id'=>$client->id])}}"
                               class="btn btn-sm btn-danger">Deletar</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            {!! $clients->render() !!}
        </div>
    </div>
@endsection