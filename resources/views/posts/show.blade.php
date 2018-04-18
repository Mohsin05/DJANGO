@extends('layouts.app')

@section('content')


 <a href="{{ route('posts.edit', ['id' => $post->id]) }}"><b1>{{$post->title}}</b1></a>

@endsection






