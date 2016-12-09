@extends('layouts.mainGallery')


@section('content')

<form method='POST' action='/artwork' enctype="multipart/form-data">

     {{ csrf_field() }}

     <div>
    <label>Artist:
    <input type='text' id='artist' name='artist' value='{{ old('artist') }}'>
    </label>
    </div>

    <div>
    <label>Title of the piece:
    <input type='text' id='title' name='title' value='{{ old('title') }}'>
    </label>
    </div>

    <div>
    <label>Date of completion:
    <input type='date' id='date' name='date' value='{{ old('date') }}'>
    </label>
    </div>

    <div>
    <label>What medium did you use?:
    <input type='text' id='medium' name='medium' value='{{ old('medium') }}'>
    </label>
    </div>

    <div>
    <input type='file' id='image' name='image_upload'>
    </div>

    <div>
    <input type='submit' value='Submit'>
    </div>
    
 </form>

@endsection
