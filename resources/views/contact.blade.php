@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="content">
            <div class="title">Contact Page</div>

            @if (count($country))

                @foreach($country as $item)
                <h1>{{$item}}</h1>
                @endforeach
                @endif
        </div>
    </div>

    @endsection