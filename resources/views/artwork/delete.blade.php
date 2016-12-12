@extends('layouts.mainGallery')

@section('title')
Confirm deletion: {{ $artpiece->title }}

$artpiece->title = $request->input('title');

@endsection


@section('content')

<h1>Are you sure you want to delete this?</h1>
<form method='POST' action='/artwork/{{ $artpiece->id }}'>

    {{ method_field('DELETE') }}

    {{ csrf_field() }}

    <h2><em>{{ $artpiece->title }}</em>?</h2>

    <input type='submit' value='Yes'>

</form>


@endsection
