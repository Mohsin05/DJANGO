@extends('layouts.app')

@section('content')

<h1>Create Post</h1>
{!! Form::open(['action' => 'PostsController@store','files'=>true, 'method' => 'POST']) !!}


    <div class="form-group">
    {!! Form::label('title', 'Tittle:') !!}
    {!! Form::text('title',null, ['class'=>'form-control']) !!}
        <br>
        <br>
        {!! Form::file('file',['class'=>'form-control']) !!}
        <br>
        <br>
    {!! Form::submit('Click Me!', ['class'=>'form-control']) !!}
    </div>



    {{csrf_field()}}

{!! Form::close() !!}

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection






