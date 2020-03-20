@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.centers.update',$center)}}"  method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="form-input">
            <label for="hospital_name">Center name:</label>
            <input type="text" value="{{$center->name}}" name="center_name" id="center_name"></label>
        </div>
        <div class="form-input">
            <label for="center_address">Center address:</label>
            <input type="text" value="{{$center->address}}" name="center_address" id="center_address"></label>
        </div>
        @if(isset($center->phone))
            <div class="form-input">
                <label for="center_name">Center phone:</label>
                <input type="text" value="{{$center->phone}}" name="center_phone" id="center_phone"></label>
            </div>
        @else
            <div class="form-input">
                <label for="center_name">Center phone:</label>
                <input type="text"  name="center_phone" id="center_phone"></label>
            </div>
        @endif
        @if(isset($center->opening_date))
            <div class="form-input">
                <label for="center_name">Center opening_date:</label>
                <input type="text" value="{{$center->opening_date}}" name="center_opening_date" id="center_opening_date"></label>
            </div>
        @else
            <div class="form-input">
                <label for="center_name">Center opening_date:</label>
                <input type="text"  name="center_name" id="center_name"></label>
            </div>
        @endif
        <input type="submit" value="Edit">
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection
