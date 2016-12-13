@extends('layouts.mainGallery')


@section('content')

<h1>Edit {{ $artpiece->title }} </h1>

<form method='POST' action='/artwork/{{ $artpiece->id }}'>

    {{ method_field('PUT') }}

    {{ csrf_field() }}

    <input name='id' value='{{$artpiece->id}}' type='hidden'>

    <div>
        <label>Title:</label>
        <input type='text' name='title' value='{{ old('title', $artpiece->title) }}'
        >
        <div class='error'>{{ $errors->first('title') }}</div>
    </div>

    <div>
        <label>Artist:</label>
        <select name='artist_id'>
            @foreach($artists_for_dropdown as $artist_id => $artist)
            <option
            {{ ($artist_id == $artpiece->artist->id) ? 'SELECTED' : '' }}
            value='{{ $artist_id }}'>{{ $artist }}</option>
            @endforeach
        </select>
    </div>


    <div>
        <label>Date (YYYY/DD/MM):</label>
        <input type='text' name='date' value='{{ old('date' , $artpiece->date) }}'
        >
        <div class='error'>{{ $errors->first('date') }}</div>
    </div>

    <div>
        <label>Upload Image:</label>
        <input
        type='file' name='image' value='{{ old('image', $artpiece->image) }}'
        >
        <div class='error'>{{ $errors->first('image') }}</div>
    </div>

    <div>
        <label>Medium:</label>
        <input
        type='text' name='medium' value='{{ old('medium', $artpiece->medium) }}'
        >
        <div class='error'>{{ $errors->first('medium') }}</div>
    </div>

    <div>
        <label>Description:</label>
        <input
        type='text' name='description' value='{{ old('description', $artpiece->description) }}'
        >
        <div class='error'>{{ $errors->first('description') }}</div>
    </div>

    <div class='tag'>
        <label>Tags</label>
        <br>
        @foreach($tags_for_checkboxes as $tag_id => $tag_name)
        <input
        type='checkbox'
        value='{{ $tag_id }}'
        name='tags[]'
        {{ (in_array($tag_name, $tags_for_this_artpiece)) ? 'CHECKED' : '' }}
        >
        {{ $tag_name }} <br>
        @endforeach
    </div>


    <button type="submit">Save changes</button>


    <div class='error'>
        @if(count($errors) > 0)
        Please correct the errors above and try again.
        @endif
    </div>

    @foreach($errors->all() as $error)
    	{{ $error }}
    @endforeach

</form>


@stop
