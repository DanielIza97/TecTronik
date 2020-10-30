@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')
<div class="col-sm-8">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> Id</th>
                <th> Calle Principal</th>
                <th > Calle Secundaria</th>
                <th > Numero de casa</th>
                <th > Foto</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($direcciones ?? '' as $direccion)
            <tr>
            <td>{{$direccion->iddireccion}}</td>
            <td>{{$direccion->calleprincipal}}</td>
            <td>{{$direccion->callesecundaria}}</td>
            <td>{{$direccion->numerodecasa}}</td>
            <td>
                <img src="../imagesdireccion/{{$direccion->imagendireccion}}" width="75"/>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection