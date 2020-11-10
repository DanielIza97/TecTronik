@extends('layouts.app')

@section('content')
<section>
    <informacion-page :cedula="{{$cedula}}">
    </informacion-page>
</section>
@endsection
