@extends('layouts.app')
@section('content')
    <section>
        <h2>Ordenes pendientes</h2>
        <div class="row justify-content-center">
            <table class="table table-active">
                <thead>
                    <tr class="card-header">
                        <th>{{__('Id Pedido')}}</th>
                        <th>{{__('Ver detalle pedido')}}</th>
                        <th>{{__('Estado')}}</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->idpedido}}</td>
                            <td>
                                <a href="{{ url('pedidos/detalles/'.$pedido->idpedido)}}" class="btn btn-add">Detalle</a>
                            </td>
                            <td>{{$pedido->estado}}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>    
@endsection
