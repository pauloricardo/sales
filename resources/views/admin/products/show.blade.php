@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    Nome:
                </div>
                <div class="col-md-7">
                    {{$produto->name}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Descrição:
                </div>
                <div class="col-md-6">
                    {{$produto->description}}
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    Preço de compra:
                </div>
                <div class="col-md-7">
                    R$ {{$produto->price}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Preço de venda:
                </div>
                <div class="col-md-7">
                    R$ {{$produto->purchase_price}}
                </div>
            </div>
            @if(!empty($produto->foto))
                <div class="row">
                    <div class="col-md-4">
                        Foto:
                    </div>
                    <div class="col-md-7">
                        <img src="{{URL::asset('uploads/produtos').'/'.$produto->foto}}" alt="">
                    </div>
                </div>
            @endif
            <br>
            <a href="{{route('admin.products.index')}}" class="btn btn-info">Voltar</a>


        </div>
    </div>
@endsection