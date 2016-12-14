@extends('layouts.mainGallery')


@section('content')

<h1>Add a new piece of your work</h1>

<form method='POST' action='/artwork' enctype="multipart/form-data">

    {{ csrf_field() }}

    <!-- <div>
        <label>Registered Artist:</label>
        <select name='artist_id'>
            <option></option>
            @foreach($artists_for_dropdown as $artist_id => $artist)
            <option value='{{ $artist_id }}'>{{ $artist }}</option>
            @endforeach
        </select>
    </div> -->

    <div>
        <select style="position:absolute;top:10px;left:20px;width:200px; height:25px;line-height:20px;margin:0;padding:0;" onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
            <option value='{{ $artist_id }}'></option>
            @foreach($artists_for_dropdown as $artist_id => $artist)
            <option value='{{ $artist_id }}'>{{ $artist }}</option>
            @endforeach
        </select>
        <input name="displayValue" placeholder="Add or Select an Artist" id="displayValue" style="position:absolute;top:10px;left:20px;width:183px;width:180px\9;#width:180px;height:23px; height:21px\9;#height:18px;border:1px solid #556;" onfocus="this.select()" type="text">
        <input name='{{ $artist_id }}' id='{{ $artist_id }}' type="hidden">
    </div>


<br>
<br>
<div class='tag'>
    <label>Tags</label>
    <br>
    @foreach($tags_for_checkboxes as $tag_id => $tag_name)
    <input type='checkbox' value='{{ $tag_id }}' name='tags[]'>
    {{ $tag_name }} <br>
    @endforeach

</div>


<div>
    <br>
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
    <label>Brief Description:
        <input type='text' id='description' name='description' value='{{ old('description') }}'>
    </label>
</div>
<div class='error'>{{ $errors->first('description') }}</div>

<div>
    <input type='file' id='image' name='image'>
</div>
<div class='error'>{{ $errors->first('image') }}</div>

<div>
    <br>
    <button type="submit">Add your work!</button>
</div>

<div class='error'>
    @if(count($errors) > 0)
    Please correct the errors above and try again.
    @endif
</div>

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

</form>


@endsection
