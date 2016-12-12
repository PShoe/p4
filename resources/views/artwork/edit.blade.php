@extends('layouts.mainGallery')


@section('content')

<h1>Edit {{ $artpiece->title }} </h1>

<form method='POST' action='/artwork/{{ $artpiece->id }}'>

    {{ method_field('PUT') }}
    
    {{ csrf_field() }}

    <input name='id' value='{{$artpiece->id}}' type='hidden'>

    <div>
        <label>Title:</label>
        <input type='text'id='title name='title' value='{{ old('title', $artpiece->title) }}'
        >
        <div class='error'>{{ $errors->first('title') }}</div>
    </div>


    <div>
        <label>Date (YYYY/DD/MM):</label>
        <input type='date' id='date'name='date' value='{{ old('date' , $artpiece->date) }}'
        >
        <div class='error'>{{ $errors->first('date') }}</div>
    </div>

    <div>
        <label>Upload Image:</label>
        <input
        type='image' id='image' name='image_upload' value='{{ old('image_upload', $artpiece->image_upload) }}'
        >
        <div class='error'>{{ $errors->first('image_upload') }}</div>
    </div>

    <div>
        <label>Artist</label>
        <select name='artist'>
            @foreach($artists_for_dropdown as $artist_id => $artist)
            <option
            {{ ($artist_id == $artpiece->artist->id) ? 'SELECTED' : '' }}
            value='{{ $artist_id }}'
            >{{ $artist }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Tags</label>
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


    <div class='form-instructions'>
        All fields are required
    </div>

    <button type="submit">Save changes</button>


    <div class='error'>
        @if(count($errors) > 0)
        Please correct the errors above and try again.
        @endif
    </div>

</form>


@stop
