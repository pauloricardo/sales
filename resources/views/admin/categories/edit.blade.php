@extends('app')

@section('content')
    <h1 class="page-header">Editar Categoria</h1>
    @include('erros');
    <div class="col-lg-12">
        <div class="row">

        {!! Form::open(['method'=>'put', 'route'=>['admin.categories.update',$category->id], 'class'=>'form form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome: ',['class'=>'col-md-2']) !!}
            <div class="col-md-5">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
        </div>

    </div>
    </div>
    <div class="row">
        {!! Form::submit('Salvar', ['class'=>'btn btn-default right']) !!}

    </div>
    {!! Form::close() !!}
@endsection