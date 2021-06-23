@extends('layouts.app')

@section('content')

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $song->title }}" readonly>
    </div>

    <div class="form-group">
      <label for="title">Description</label>
      <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $song->description }}" readonly>
    </div>    

    <div class="form-group">
      <label for="length">Length</label>
      <input type="text" class="form-control" name="length" placeholder="Length"  value="{{ $song->length }}" readonly>
    </div>

    <div class="form-group">
      <label for="album">Album</label>
      <input type="text" class="form-control" name="album" placeholder="Album"  value="{{ $song->album->title ?? '-' }}" readonly>
    </div>             

@endsection