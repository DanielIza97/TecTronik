@extends('layouts.app')
<?php
?>
@section('content')
<section>
    <detalle-page  detallenombre="{{$request}}"tipo="{{$tipo}}">
    </detalle-page>
</section>
@endsection
