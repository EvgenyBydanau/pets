@extends('layouts.app')

@section('content')



    <center> <h1>Latest Pets</h1>
        <p class="lead"><a href="{{ route('pets.create') }}">Create your ad</a></p>
    </center>

    <a class = "lead" href="{{ url('/dogs') }}">Dogs</a>


    <hr>

    <p> The list of cats</p>

    <?php echo $cats->render() ?>

    <div class = "container">
        <div class="row">
            @foreach($cats as $cat)
                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <img src="{{ URL::to('/images/' . $cat->filePath) }}" height="150" width="200"/>
                </div>
                <div class = "col-lg-7 col-md-8 col-sm-8 col-xs-12">
                    <h3>{{ $cat->title }}</h3>
                    <h4>{{$cat->price}}$</h4>
                    <h5>{{$cat->user}}</h5>
                    <h5>{{$cat->contact}}</h5>

                    <a href="{{ route('pets.show', $cat->id) }}" class="btn btn-success">View Pet</a>
                    <a href="{{ route('pets.edit', $cat->id) }}" class="btn btn-primary">Edit Pet</a>
                    <hr>
                </div>

            @endforeach
        </div>
    </div>

    <?php echo $cats->render() ?>


@stop
