@extends('app')

@section('content')
    <h1 class="page-header">Adicionar Categoria</h1>
    @include('erros');

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['method'=>'post', 'route'=>'admin.categories.store', 'class'=>'form form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            {!! Form::submit('Salvar', ['class'=>'btn btn-default']) !!}
            {!! Form::close() !!}
    </div>
    </div>
@endsection