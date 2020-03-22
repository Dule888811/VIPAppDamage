@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('officer.damages.update',$damage)}}"  method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="form-input">
            <label for="type_priority">type priority  :</label>
            <select name="type_priority">
                <option value="critical">critical</option>
                <option value="low">low</option>
                <option value="middle">middle</option>
                <option value="high">high</option>
            </select>
        </div>
        <div class="form-input">
            <label for="center_damage">center :</label>
            <select name="center_damage">
                @foreach($centers as $center)
                    <option value={{{$center->id}}}>{{{$center->name}}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-input">
            <label for="damage_description">description:
                <input type="text" value="{{$damage->description}}" name="damage_description" id="damage_description"></label>
        </div>
        <div class="form-input">
            <label for="damage_date">Damage date:
                <input type="text" value="{{$damage->date}}" name="damage_date" id="damage_date"></label>
        </div>
        <input type="submit" value="Edit">
    </form>
    <a href ="{{route('officer.main')}}">Back to maintaining</a>
@endsection
