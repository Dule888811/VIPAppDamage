@extends('layouts.app')
<style>
    .userCreate{
        padding-left: 10%;
    }

</style>
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <p class="userCreate"><a class="btn btn-primary" href ="{{route('officer.damages.create')}}">Add new damage</a>
        <a class="btn btn-primary" href ="{{route('officer.damages.index')}}">See all damages</a><br>
            <a href="../../home">Back to home</a>
@endsection