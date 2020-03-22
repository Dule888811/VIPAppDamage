@extends('layouts.app')

@section('content')
@if(count($errors))
@foreach($errors->all() as $error)
{{$error}}
@endforeach
@endif
<form action ="{{route('admin.damages.store',$damage)}}" method="POST">
    {{csrf_field()}}
    <div class="form-input">
        <label for="not_resolved">select status :</label>
        <select name="not_resolved">
            <option value="resolved"selected>resolved</option>
            <input type="submit" value="Edit">
        </select>
    </div>
