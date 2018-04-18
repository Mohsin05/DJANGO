@extends('layouts.app')

@section('content')


    <h1>Edit Post</h1>

    {!! Form::model($post,['action' => ['PostsController@update', $post->id], 'method' => 'PATCH']) !!}


    <div class="form-group">

        {!! Form::label('title', 'Tittle:') !!}
        {!! Form::text('title',null, ['class'=>'form-control']) !!}
        {!! Form::submit('Update Post!', ['class'=>'btn btn-info']) !!}
    </div>
    {{csrf_field()}}

    {!! Form::close() !!}


{!! Form::model($post,['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE']) !!}


    <div class="form-group">

        {!! Form::submit('Delete Post!', ['class'=>'btn btn-info']) !!}
    </div>
    {{csrf_field()}}

    {!! Form::close() !!}




@endsection






