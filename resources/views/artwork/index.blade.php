@extends('layouts.mainGallery')

@section('title')
View all the artwork
@endsection

@section('content')

<!-- $user-> name -->

<h1>My Gallery</h1>


@if(sizeof($artpieces) == 0)
You have not added any artwork you can <a href='/artwork/create'>add a piece now to get started</a>.
@else

<div id='artpieces' class='cf'>

    @foreach($artpieces as $artpiece)

    <section class='artpiece'>
        <h2>{{ $artpiece->title }}</h2>
        <h2>{{ $artpiece->desciption}}</h2>
        <li>{{ $artpiece->artist->first_name }} {{ $artpiece->artist->last_name }} </li>
        <li>{{ $artpiece->artist->location }} based artist </li>

    </br>
    <a href='/artpieces/{{ $artpiece->id }}'><img class='image' src='{!! url('/uploads/'.$artpiece->image) !!}') alt='Image of {{ $artpiece->title }}' width=400px border=10px></a>
</br>
<li><a class='button' href='/artwork/{{ $artpiece->id }}/edit'><i class='fa fa-pencil'></i>   Edit</a></li>
<li><a class='button' href='/artwork/{{ $artpiece->id }}'><i class='fa fa-eye'></i>  View Large</a></li>
<li><a class='button' href='/artwork/{{ $artpiece->id }}/delete'><i class='fa fa-trash'></i>   Delete</a></li>

<p>
    {{ $artpiece->date}}</br>
    {{ $artpiece->medium}}</br>
    {{ $artpiece->description}}</br>
</p>

@foreach($artpiece->tags as $tag)
<li style="color:grey;" class='tag'>{{ $tag->name }}</li>
@endforeach

</section>

@endforeach


</div>
@endif

@endsection
