@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.users.store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-input">
            <label for="doctor_surname">user name:</label>
            <input type="text" name="user_name" id="user_name"></label>
        </div>
        <div class="form-input">
            <label for="doctor_surname">user email:</label>
            <input type="text" name="user_email" id="user_email"></label>
        </div>
        <div class="form-input">
            <label for="doctor_address">user role:</label>
            <select name="role">
                <option value="admin">admin</option>
                <option value="officer" selected>officer</option>
            </select>
        </div>
        <input type="submit"   value="Add user"><br/>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection
