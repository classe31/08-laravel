@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('admin.songs.store')}}">

    @csrf
    @method('POST')

    @include('partials.validation-errors')

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description') }}">
    </div>    

    <div class="form-group">
      <label for="length">Length</label>
      <input type="text" class="form-control" name="length" placeholder="Length"  value="{{ old('length') }}">
    </div>

    <div class="form-group">
      <label for="album">Album</label>
      <select id="album" class="form-control" name="album_id">
          <option value="">Seleziona album</option>
          @foreach ($albums as $album)
              <option {{ old('album_id') == $album->id ? 'selected' : '' }}
                  value="{{ $album->id }}">
                  {{ $album->title }}
              </option>
          @endforeach
      </select>
    </div>    

    <button type="submit" class="btn btn-success">Submit</button>

  </form>
@endsection