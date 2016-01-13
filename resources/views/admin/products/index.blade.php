@extends('app')

@section('content')
    <h1 class="page-header">Produtos</h1>
    <div class="row">
        <div class="col-lg-12">
            <div>
            <a href="{{route('admin.products.create')}}" class="btn btn-danger left">Novo Produto</a>
            <a href="{{route('admin.categories.create')}}" class="btn btn-danger left" target="__blank">Nova Categoria</a>
                <div class="clearfix"></div>
            </div>
                <br><br>
            <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço de compra</th>
                    <th>Preço de venda</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>R$ {{$product->purchase_price}}</td>
                        <td>R$ {{$product->price}}</td>
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