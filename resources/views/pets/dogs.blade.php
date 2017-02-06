@extends('layouts.app')

@section('content')



    <center> <h1>Latest Pets</h1>
        <p class="lead"><a href="{{ route('pets.create') }}">Create your ad</a></p>
    </center>

    <a class = "lead" href="{{ url('/cats') }}">Cats</a>


    <hr>

    <p> The list of dogs</p>

    <?php echo $dogs->render() ?>

    <div class = "container">
        <div class="row">
            @foreach($dogs as $dog)
                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <img src="{{ URL::to('/images/' . $dog->filePath) }}" height="150" width="200"/>
                </div>
                <div class = "col-lg-7 col-md-8 col-sm-8 col-xs-12">
                    <h3>{{ $dog->title }}</h3>
                    <h4>{{$dog->price}}$</h4>
                    <h5>{{$dog->user}}</h5>
                    <h5>{{$dog->contact}}</h5>

                    <a href="{{ route('pets.show', $dog->id) }}" class="btn btn-success">View Pet</a>
                    <a href="{{ route('pets.edit', $dog->id) }}" class="btn btn-primary">Edit Pet</a>
                    <hr>
                </div>

            @endforeach
        </div>
    </div>

    <?php echo $dogs->render() ?>


@stop

