@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center m5">
                <div class=" col-lg-5 table-success">
                    <div class="card-header1 table-success"><span class="titulo">Codigo del pedido:</span> {{$pedido->idpedido}}</div>
                    <div class="card-body1"><span class="titulo"> Nombre del Cliente:</span> {{$pedido->cliente->nombrecliente}}</div>
                    <div class="card-body1"><span class="titulo"> Direccion:</span> {{$pedido->direcciones->calleprincipal}} {{$pedido->direcciones->numerodecasa}} y {{$pedido->direcciones->callesecundaria}} </div>
                    <div class="card-body1"><span class="titulo"> Fecha de pedido:</span>  {{$pedido->fechapedido}}</div>
                    <div class="card-body1">
                        <form action="{{url('pedidos/notificar/'.$pedido->idpedido)}}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <span class="titulo"> Estado de la entrega: </span>
                            <select name="estado" id="estado" class="select">
                                <option value="entregado" {{ ("entregado" == $pedido->estado ? "selected":"") }}>{{ __('entregado') }}</option>
                                <option value="pendiente" {{ (old("estado", "pendiente") == $pedido->estado ? "selected":"") }}>{{ __('pendiente') }}</option>
                                <option value="entregar" {{ (old("estado", "entregar") == $pedido->estado ? "selected":"") }}>{{ __('entregar') }}</option>
                            </select>
                                <div class="card-body1 row justify-content-center">
                                    <input type="submit" class="btn btn-add" value="Entregar" {{("entregado" == $pedido->estado ? "disabled":"")}}>
                                </div>
                                <div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
