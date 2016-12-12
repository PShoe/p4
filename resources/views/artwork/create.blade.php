@extends('layouts.mainGallery')


@section('content')

<h1>Add a new piece of your work</h1>

<form method='POST' action='/artwork' enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class='form-group'>
        <label>Artist:</label>
        <select name='artist_id'>

            @foreach($artists_for_dropdown as $artist_id => $artist)
            <option value='{{ $artist_id }}'>{{ $artist }}</option>
            @endforeach

        </select>
    </div>

    <div class='form-group'>
        <label>Tags</label>

        @foreach($tags_for_checkboxes as $tag_id => $tag_name)
        <input type='checkbox' value='{{ $tag_id }}' name='tags[]'>
        {{ $tag_name }} <br>
        @endforeach

    </div>

    <div>
        <label>Title of the piece:
            <input type='text' id='title' name='title' value='{{ old('title') }}'>
        </label>
    </div>
    <div class='error'>{{ $errors->first('title') }}</div>

    <div>
        <label>Date of completion:  'YYYY-DD-MM',
            <input type='text' id='date' name='date' value='{{ old('date') }}'>
        </label>
    </div>
    <div class='error'>{{ $errors->first('date') }}</div>

    <div>
        <label>What medium did you use?:
            <input type='text' id='medium' name='medium' value='{{ old('medium') }}'>
        </label>
    </div>
    <div class='error'>{{ $errors->first('medium') }}</div>

    <div>
        <label>Leave a short description below:
            <input type='text' id='description' name='description' value='{{ old('description') }}'>
        </label>
    </div>
    <div class='error'>{{ $errors->first('description') }}</div>

    <div>
        <input type='file' id='image' name='image'>
    </div>
    <div class='error'>{{ $errors->first('image') }}</div>

    <div>
        <button type="submit">Add your work!</button>
    </div>

    <div class='error'>
        @if(count($errors) > 0)
        Please correct the errors above and try again.
        @endif
    </div>

</form>

@endsection
