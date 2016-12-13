@extends('layouts.mainGallery')


@section('content')


    <section class='show'>
        <h2>{{ $artpiece->title }}</h2>
        <h2>{{ $artpiece->desciption}}</h2>
        <li>{{ $artpiece->artist->first_name }} {{ $artpiece->artist->last_name }} </li>
        <li>{{ $artpiece->artist->location }} based artist </li>

        </br>
        <a href='/artpieces/{{ $artpiece->id }}'><img class='image' src='{!! url('/uploads/'.$artpiece->image) !!}') alt='Image of {{ $artpiece->title }}' width=1000px border=10px></a>
    </br>
        <a class='button' href='/artwork/{{ $artpiece->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
        <a class='button' href='/artwork/{{ $artpiece->id }}/delete'><i class='fa fa-trash'></i> Delete</a>

        <p>
            {{ $artpiece->date}}</br>
            {{ $artpiece->medium}}</br>
            {{ $artpiece->description}}</br>
        </p>

            @foreach($artpiece->tags as $tag)
            <li style="color:grey;" class='tag'>{{ $tag->name }}</li>
            @endforeach
    </section>

    <a class='return' href='/artwork'>&larr; Return to all submitted artwork</a>
