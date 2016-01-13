@extends('app')

@section('content')
    <h1 class="page-header">Clientes</h1>
    <div class="row">
        <div class="col-lg-12">
    <a href="{{route('admin.clients.create')}}" class="btn btn-danger">Cadastrar Cliente</a><br><br>
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
                    <a href="{{route('admin.clients.edit', ['id'=>$client->id])}}" class="btn btn-sm btn-default">Editar</a>
                    <a href="{{route('admin.clients.delete', ['id'=>$client->id])}}" class="btn btn-sm btn-danger">Deletar</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {!! $clients->render() !!}
    </div>
    </div>
@endsection