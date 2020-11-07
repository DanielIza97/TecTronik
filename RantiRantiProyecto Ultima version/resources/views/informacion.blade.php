@extends('layouts.app')

@section('content')
    <informacion-page :cedula="{{$cedula}}">
    </informacion-page>
@endsection
