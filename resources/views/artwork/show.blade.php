@extends('layouts.mainGallery')


@section('content')

    <h1>{{ $artpiece->title }}</h1>

    <h2>{{ $artpiece->artist }}</h2>

    <img src='{{ $artpiece->image }}' alt='{{$artpiece->image }}'>

    <!-- <div class='tags'>
        @foreach($artpiece->tags as $tag)
            <div class='tag'>{{ $tag->name }}</div>
        @endforeach
    </div> -->

    <a class='button' href='/artwork/{{ $artpiece->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
    <a class='button' href='/artwork/{{ $artpiece->id }}/delete'><i class='fa fa-trash'></i> Delete</a>

    <br><br>
    <a class='return' href='/artwork'>Return to the gallery</a>

@endsection
