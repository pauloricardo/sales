@extends('app')

@section('content')
    <h1 class="page-header">Adicionar Cliente</h1>
    @include('erros');

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['method'=>'post', 'route'=>'admin.clients.store', 'class'=>'form form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Telefone:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Endereço:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('address', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('state', 'Estado: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('state', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('zip_code', 'CEP:',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('zip_code', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            {!! Form::submit('Salvar', ['class'=>'btn btn-danger']) !!}
            <a href="{{route('admin.clients.index')}}" class="btn btn-info">Voltar</a>

            {!! Form::close() !!}
        </div>

    </div>
@endsection