@extends('app')

@section('content')
    <h1 class="page-header">Produtos</h1>
    <div class="row" ng-controller="ProductsCtrl">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                <tr ng-repeat="p in products">
                                    <td><% p.id %></td>
                                    <td><% p.name %></td>
                                    <td><% p.category.name %></td>
                                    <td><% p.purchase_price  %></td>
                                    <td><% p.price  %></td>
                                    <td><% p.qtd %></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
@endsection