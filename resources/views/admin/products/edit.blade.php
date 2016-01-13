@extends('app')

@section('content')
    <h1 class="page-header">Editar Produto</h1>
    @include('erros');

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['method'=>'put', 'route'=>['admin.products.update',$product->id], 'class'=>'form form-horizontal', 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('category_id', 'Categoria: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::select('category_id', $categories,$product->category->id, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Nome: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('foto', 'Foto: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    @if(!is_null($product->foto))
                        <img src="{{URL::asset('uploads/produtos/').'/'.$product->foto}}" alt="">
                        <br><br>
                    @endif
                    {!! Form::file('image', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Descrição: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('purchase_price', 'Preço de compra: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('purchase_price', $product->purchase_price, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Preço de venda: ',['class'=>'col-md-2']) !!}
                <div class="col-md-5">
                    {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
                </div>
            </div>
            {!! Form::submit('Salvar', ['class'=>'btn btn-danger']) !!}
            <a href="{{route('admin.products.index')}}" class="btn btn-info">Voltar</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection