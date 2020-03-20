@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="list">
        <a class="btn btn-primary"  href ="{{route('officer.damages.create')}}">Create damage</a>
        @foreach($damages as $damage)
            <div  class="flex-container">
                <ul class="ul-products">
                    <li class="li-products">Damage date: {{$damage->name}}</li>
                    <li class="li-products">Damage description: {{$damage->description}}</li>
                    <li class="li-products">Damage type_of_priority: {{$damage->type_of_priority}}</li>
                    <li class="li-products">Damage status: {{$damage->status}}</li>
                    <li class="li-products">Damage center: {{$damage->centers()->name}}</li>

                </ul>
                <hr class="hrli">
        @endforeach
            </div>



