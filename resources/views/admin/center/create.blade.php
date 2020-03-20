@extends('layouts.app')
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.centers.store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-input">
            <label for="hospital_name">Center name:
                <input type="text" name="center_name" id="center_name"></label>
        </div>
        <div class="form-input">
            <label for="center_address">Center address:
                <input type="text" name="center_address" id="center_address"></label>
        </div>
        <div class="form-input">
            <label for="center_phone">Center phone:
                <input type="text" name="center_phone" id="center_phone"></label>
        </div>
        <div class="form-input">
            <label for="center_opening_date">Center opening date:
                <input type="text" name="center_opening_date" id="center_opening_date"></label>
        </div>
            <input type="submit">
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection


