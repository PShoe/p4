@extends('layouts.mainGallery')


@section('content')

    <h1 class='truncate'>{{ $artpiece->title }}</h1>

    <h2 class='truncate'>{{ $artpiece->artist->first_name }} {{ $artpiece->artist->last_name }}</h2>

    <img class='cover' src='{{ $artpiece->cover }}' alt='Image of {{$artpiece->title}}'>

    <div class='tags'>
        @foreach($artpiece->tags as $tag)
            <div class='tag'>{{ $tag->name }}</div>
        @endforeach
    </div>

    <a class='button' href='/artwork/{{ $artpiece->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
    <a class='button' href='/artwork/{{ $artpiece->id }}/delete'><i class='fa fa-trash'></i> Delete</a>

    <br><br>
    <a class='return' href='/artwork'>&larr; Return to all submitted artwork</a>
