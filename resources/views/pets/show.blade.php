@extends('layouts.app')

@section('content')

    <h1>{{ $pet->price }}</h1>
    <h2>{{ $pet->title }}</h2>
    <h2>{{ $pet->user }}</h2>
    <img src="{{ URL::to('/images/' . $pet->filePath) }}" height="200" width="200"/>
    <p>{{ $pet->contact }}</p>
    <p>{{ $pet->description }}</p>

    <hr>

    <a href="{{ route('pets.index') }}" class="btn btn-success">Back to all pets</a>
    <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-primary">Edit pet</a>

    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['pets.destroy', $pet->id]
        ]) !!}
        {!! Form::submit('Delete this pet?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@stop