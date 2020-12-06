@extends('layouts.app')

@section('content')
<section>
    <informacion-page :cedula="{{$cedula}}" :iniciosesion="{{$iniciosesion}}">
    </informacion-page>
</section>
@endsection
