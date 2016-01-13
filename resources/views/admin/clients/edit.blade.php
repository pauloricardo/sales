@extends('app')

@section('content')
    <h1 class="page-header">Editar Cliente</h1>
    @include('erros');

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['method'=>'put', 'route'=>['admin.clients.update', $client->id], 'class'=>'form form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('name', $client->user->name, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('email', $client->user->email, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Telefone:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                {!! Form::text('phone', $client->phone, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Endereço:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                {!! Form::text('address',  $client->address, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('state', 'Estado: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                {!! Form::text('state', $client->state, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('zip_code', 'CEP:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                {!! Form::text('zip_code', $client->zip_code, ['class'=>'form-control']) !!}
                </div>
            </div>
            {!! Form::submit('Salvar', ['class'=>'btn btn-danger']) !!}
            <a href="{{route('admin.clients.index')}}" class="btn btn-info">Voltar</a>
            {!! Form::close() !!}
    </div>
    </div>
@endsection