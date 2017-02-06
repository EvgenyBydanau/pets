@extends('layouts.app')

@section('content')



    <h1>Welcome Home</h1>
    <p class="lead"></p>
    <hr>




    <center> <h1>Latest Pets</h1>
        <p class="lead"><a href="{{ route('pets.create') }}">Create your ad</a></p>
    </center>
    <hr>
     <h1>Latest adverts</h1>


    @foreach($pets->chunk(4) as $pet)
        <div class="row">
            @foreach($pet as $p)
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <h2>{{ $p->title }}</h2>
                    <h3>{{$p->price}}$</h3>
                    <h5>{{$p->user}}</h5>
                    <h5>{{$p->contact}}</h5>
                    <h5>{{$p->created_at}}</h5>
                    <img src="{{ URL::to('/images/' . $p->filePath) }}" height="200" width="200"/>
                    <hr>
                    <a href="{{ route('pets.show', $p->id) }}" class="btn btn-success">View Pet</a>
                    <a href="{{ route('pets.edit', $p->id) }}" class="btn btn-primary">Edit Pet</a>
                </div>
            @endforeach
        </div>
    @endforeach




@stop