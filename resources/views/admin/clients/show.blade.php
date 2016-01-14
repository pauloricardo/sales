@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    Nome:
                </div>
                <div class="col-md-7">
                    {{$cliente->user->name}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    E-mail:
                </div>
                <div class="col-md-6">
                    {{$cliente->user->email}}
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    Telefone:
                </div>
                <div class="col-md-7">
                    {{$cliente->phone}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Endereço:
                </div>
                <div class="col-md-7">
                    {{$cliente->address}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Cidade:
                </div>
                <div class="col-md-7">
                    {{$cliente->city}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                   <strong>Estado:</strong>
                </div>
                <div class="col-md-7">
                    {{$cliente->state}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    CEP:
                </div>
                <div class="col-md-7">
                    {{$cliente->zip_code}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Cliente desde:
                </div>
                <div class="col-md-7">
                    {{date('d/m/Y', strtotime($cliente->created_at))}}
                </div>
            </div>
            @if(!empty($cliente->foto))
                <div class="row">
                    <div class="col-md-4">
                        Foto:
                    </div>
                    <div class="col-md-7">
                        <img src="{{URL::asset('uploads/produtos').'/'.$cliente->foto}}" alt="">
                    </div>
                </div>
            @endif
            <br>
            <a href="{{route('admin.products.index')}}" class="btn btn-info">Voltar</a>


        </div>
    </div>
@endsection