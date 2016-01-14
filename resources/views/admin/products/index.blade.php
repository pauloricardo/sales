@extends('app')

@section('content')
    <h1 class="page-header">Produtos</h1>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <a href="{{route('admin.products.create')}}" class="btn btn-danger left" style="margin-right:10px;">Novo
                    Produto</a>
                <a href="{{route('admin.categories.create')}}" class="btn btn-danger left" style="margin-right:10px;"
                   target="__blank">Nova Categoria</a>
                <a href="javascript:;" class="btn btn-info left filter-btn" target="__blank">Filtrar</a>

                <div class="clearfix"></div>
            </div>

            <div class="filter-fields well well-lg">
                {!! Form::open(['method'=>'post', 'route'=>'admin.products.index', 'class'=>'form form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome: ',['class'=>'col-md-1']) !!}
                    <div class="col-md-3">
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria: ',['class'=>'col-md-1']) !!}
                    <div class="col-md-3">
                        {!! Form::select('category_id', array_merge(['' => 'Selecione uma categoria'], $categories),null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('qtd', 'Quantidade: ',['class'=>'col-md-1']) !!}
                    <div class="col-md-3">
                        {!! Form::text('qtd', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('Filtrar', ['class'=>'btn btn-default']) !!}
                <a href="{{route('admin.products.index')}}" class="btn btn-info">Limpar</a>
                {!! Form::close() !!}

            </div>
            <br><br>
            <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço de compra</th>
                    <th>Preço de venda</th>
                    <th>Qtd</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>R$ {{$product->purchase_price}}</td>
                        <td>R$ {{$product->price}}</td>
                        <td>{{$product->qtd}}</td>
                        <td>
                            <a href="{{route('admin.products.show', ['id'=>$product->id])}}"
                               class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{route('admin.products.edit', ['id'=>$product->id])}}"
                               class="btn btn-sm btn-default">Editar</a>
                            <a href="{{route('admin.products.delete', ['id'=>$product->id])}}"
                               class="btn btn-sm btn-danger">Deletar</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            {!! $products->render() !!}
        </div>
    </div>
@endsection