@extends('layouts.app')
<style>
    .doctor{
        padding-left: 10%;
    }

</style>
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <p class="doctor"><a class="btn btn-primary" href ="{{route('admin.users.create')}}">Add new user</a>
    <a class="btn btn-primary" href ="{{route('admin.centers.index')}}">See all centers</a>
    <a class="li-products"><a class="btn btn-primary"  href ="{{route('admin.centers.create')}}">Create center</a><br>
    <a href="../../home">Back to home</a>
@endsection
