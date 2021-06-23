@extends('layouts.app')

@section('content')

    @include('partials.success-error-messages')

    @if(count($songs) == 0)

        <h1 class="text-center">Non hai ancora canzoni nel database</h1>

        <div class="text-center">
            <a class="btn btn-success" href="{{ route('admin.songs.create') }}">
                Crea una nuova canzone
            </a>
        </div>        

    @else

        <table class="table table-striped">
                
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Length</th>
                    <th>*</th>
                    <th>*</th>
                    <th>*</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($songs as $song)

                    <tr>
                        <td>{{$song->id}}</td>
                        <td>{{$song->title}}</td>
                        <td>{{$song->description}}</td>
                        <td>{{$song->length}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.songs.show', $song->id) }}">Dettagli</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.songs.edit', $song->id) }}">Modifica</a>
                        </td>
                        <td>
                            <form method='POST' action="{{ route('admin.songs.destroy', $song->id) }}">
                                @csrf
                                @method('DELETE')
                                
                                <input class="btn btn-danger" type="submit" value="Cancella">
                            </form>
                        </td>                                        
                    </tr>            

                @endforeach

            </tbody>

        </table>    

    @endif

@endsection