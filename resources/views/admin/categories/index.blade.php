@extends('app')

@section('content')
    <h1>Categorias</h1>
    <div class="row">
        <div class="col-lg-12">
    <a href="{{route('admin.categories.create')}}" class="btn btn-danger">Nova Categoria</a><br><br>
    <table class="table table-responsive table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('admin.categories.edit', ['id'=>$category->id])}}" class="btn btn-sm btn-default">Editar</a>
                    <a href="{{route('admin.categories.delete', ['id'=>$category->id])}}" class="btn btn-sm btn-danger">Deletar</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {!! $categories->render() !!}
    </div>
    </div>
@endsection