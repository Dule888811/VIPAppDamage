@extends('layouts.app')
<style>
    .flex-container {
        margin-bottom: 11%;
        text-align: center;

    }
    .li-products{
        list-style-type : none;
        padding-bottom: 3%;
    }
    .hrli {
        border: 1px solid black;
    }
</style>
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="list">
        @foreach($centers as $center)
            <div  class="flex-container">
                <ul class="ul-products">
                    <li class="li-products">Center name: {{$center->name}}</li>
                    <li class="li-products">Center address: {{$center->address}}</li>
                    @if(isset($center->phone))
                        <li class="li-products">Center address: {{$center->phone}}</li>
                    @endif
                    @if(isset($center->opening_date))
                        <li class="li-products">Center address: {{$center->opening_date}}</li>
                    @endif
                    <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.centers.edit',$center->id)}}">Edit</a></li>
                    <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.centers.delete',$center->id)}}">Delete</a></li>
                </ul>
            </div>
            <hr class="hrli">
        @endforeach

    </div>
    <hr>

@endsection