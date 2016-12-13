@extends('layouts.mainGallery')


@section('content')

    <h1>{{ $artpiece->title }}</h1>

    <h2>{{ $artpiece->artist->first_name }} {{ $artpiece->artist->last_name }}</h2>

    <img src='public/uploads/4.jpg' alt='Image of {{$artpiece->title}}' width="200">

    <div class='tags'>
        @foreach($artpiece->tags as $tag)
            <div class='tag'>{{ $tag->name }}</div>
        @endforeach
    </div>

    <a class='button' href='/artwork/{{ $artpiece->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
    <a class='button' href='/artwork/{{ $artpiece->id }}/delete'><i class='fa fa-trash'></i> Delete</a>

    <br><br>
    <a class='return' href='/artwork'>&larr; Return to all submitted artwork</a>
