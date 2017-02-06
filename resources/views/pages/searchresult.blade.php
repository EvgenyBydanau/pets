@extends('layouts.app')

@section('content')

 <p> The Search results for your query <b> {{ $query }} </b> are :</p>


 @if(isset($message))

    <p>{{ $message }}</p>


 @else

   @foreach($pet as $p)

       <h1>{{ $p->price }}</h1>
       <h2>{{ $p->title }}</h2>
       <h2>{{ $p->user }}</h2>
       <img src="{{ URL::to('/images/' . $p->filePath) }}" height="200" width="200"/>
       <p>{{ $p->contact }}</p>
       <p>{{ $p->description }}</p>

       <hr>
       <a href = "{{route('pets.show', $p->id)}}" class = "btn btn-success">View pet</a>
       <a href="{{ route('pets.index') }}" class="btn btn-success">Back to all pets</a>



 <hr>

   @endforeach
  @endif
@stop