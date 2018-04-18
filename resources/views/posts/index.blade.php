@extends('layouts.app')

@section('content')

   <h1>Welcome back! <br>You're doing great baby!</h1>

<h1>Create Post</h1>

   {!! Form::open(['action' => 'PostsController@create','method' => 'get']) !!}


   <div class="form-group">
          {!! Form::submit('Create Post') !!}
   </div>




   {!! Form::close() !!}




   <br>
   <h1>Posts</h1>
    <ul>
        @foreach($posts as $post)
            <a href="{{route('posts.show',$post->id)}}"><li>{{$post->title}}<br>
                <img style="height: 100px; " src="{{$post->path}}">

                </li></a>
        @endforeach
    </ul>




@endsection






