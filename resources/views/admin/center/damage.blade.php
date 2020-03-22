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

        @foreach($damages as $damage)
            <div  class="flex-container">
                <ul class="ul-products">
                    <li class="li-products">Damage status: {{$damage->status}}</li>
                    <li class="li-products">Damage description: {{$damage->type_of_priority	}}</li>
                    <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.status.edit',$damage->id)}}">EditStatus</a></li>
                    <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.damages.removeDamage',$damage->id)}}">Delete</a></li>
                </ul>
            </div>
            <hr class="hrli">
        @endforeach

    </div>
    <hr>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection




