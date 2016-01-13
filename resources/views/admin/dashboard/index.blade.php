@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Painel de Controle</h1>
            <br>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Últimos pedidos</strong>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>ID#</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Mudar Status</th>
                            <th>Ações</th>
                        </tr>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->client->user->name}}</td>
                                <td>R$ {{$order->total}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    <div class="btn-group-sm" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">Encaminhado</button>
                                        <button type="button" class="btn btn-success">Entregue</button>
                                        <button type="button" class="btn btn-danger">Erro</button>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group-sm" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">Visualizar Pedido</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {!! $orders->render() !!}
                </div>

            </div>
        </div>
    </div>
@endsection