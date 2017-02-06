@extends('layouts.app')

@section('content')

    <h1>Add  New Ad</h1>
    <p class="lead">Here you can create your ad</p>
    <hr>
    @include('partials.alerts.errors')


    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    {!! Form::open([
    'route' => 'pets.store',
    'files' => 'true'
           ]) !!}



    <div class="form-group">
        {!! Form::label('image', 'Choose an image') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="form-group">
        {!! Form::label('pet_type', 'Pet type:', ['class' => 'control-label']) !!}
        {!! Form::select('pet_type', ['dog' => 'dog','cat' => 'cat'], null, ['placeholder' => 'choose pet type...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Breed:', ['class' => 'control-label']) !!}
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


    {!! Form::submit('Create New Ad', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@stop