@extends('layouts.app')
@section('content')
    <informacion-page identificador="{{$idcedulacliente}}">
    </informacion-page>
@endsection
<script>
    src="{{mix('js/app.js')}}"        
</script>