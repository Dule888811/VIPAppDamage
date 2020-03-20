@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.centers.destroy',$center)}}" method="POST">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <div class="form-input">
            <label for="del">Are you sure you want to delete?</label>
            <input type="submit"   value="Delete"><br/>
        </div>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection