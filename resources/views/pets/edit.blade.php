@extends('layouts.app')

@section('content')

    <h1>Edit Pet - Pet Name </h1>
    <p class="lead">Edit this pet below. <a href="{{ route('pets.index') }}">Go back to all pets.</a></p>
    <hr>


    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif


    {!! Form::model($pet, [
    'method' => 'PATCH',
    'route' => ['pets.update', $pet->id],
    'files' => 'true'
]) !!}


    <div class="form-group">
        {!! Form::label('image', 'Choose an image') !!}
        {!! Form::file('image') !!}

    </div>

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:', ['class' => 'control-label']) !!}
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('contact', 'Contact:', ['class' => 'control-label']) !!}
        {!! Form::text('contact', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update Pet', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@stop