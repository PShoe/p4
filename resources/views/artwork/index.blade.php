@extends('layouts.mainGallery')

@section('title')
View all the artwork
@endsection

@section('content')

<h1>All the artpieces</h1>

@if(sizeof($artpieces) == 0)
You have not added any artwork you can <a href='/artwork/create'>add a piece now to get started</a>.
@else
<div id='artpieces' class='cf'>
    @foreach($artpieces as $artpiece)

    <section class='artpiece'>
        <a href='/artpieces/{{ $artpiece->id }}'><h2 class='truncate'>{{ $artpiece->title }}</h2></a>

        <h3 class='truncate'>{{ $artpiece->author->first_name }} {{ $artpiece->author->last_name }}</h3>

        <a href='/artpieces/{{ $artpiece->id }}'><img class='image' src='{{ $artpiece->image }}' alt='Image of {{ $artpiece->title }}'></a>

        <div class='tags'>
            @foreach($artpiece->tags as $tag)
            <div class='tag'>{{ $tag->name }}</div>
            @endforeach
        </div>

        <a class='button' href='/artwork/{{ $artpiece->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
        <a class='button' href='/artwork/{{ $artpiece->id }}'><i class='fa fa-eye'></i> View</a>
        <a class='button' href='/artwork/{{ $artpiece->id }}/delete'><i class='fa fa-trash'></i> Delete</a>
    </section>
    @endforeach
</div>
@endif

@endsection
