<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Song;
use App\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $songs = Song::all();

        return view('songs.index', compact("songs"));
    }
    */

    public function index()
    {
        $songs = Song::all();
        
        $data = [
            "songs" => $songs
        ];
        
        return view('songs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();

        return view('songs.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:songs|max:200',
            'description' => 'required',
            'length' => 'required|integer',
            'album_id' => 'nullable|exists:albums,id'
        ]);

        /*
        $song = new Song();

        $song->title = $request->input('title');
        $song->description = $request->input('description');
        $song->length = $request->input('length');

        if(!empty($request->input('album_id'))) {

            $album_id = $request->input('album_id');
            $album = Album::find($album_id);

            $song->album()->associate($album);            
        }   

        $song->save();
        */

        $data = $request->all();

        $song = new Song();

        $song->fill($data);

        $song->save();

        return redirect()->route('admin.songs.index')->with('success', 'Salvataggio avvenuto correttamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    /*
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }
    */

    public function show($id)
    {
        $song = Song::findOrFail($id);

        return view("songs.show", compact('song'));        
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $albums = Album::all();

        $data = [
            'albums' => $albums,
            'song' => $song
        ];

        return view('songs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|unique:songs,title,' . $song->id .'|max:200',
            'description' => 'required',
            'length' => 'required|integer',
            'album_id' => 'nullable|exists:albums,id'
        ]);
                
        $song->title = $request->input('title');
        $song->description = $request->input('description');
        $song->length = $request->input('length');

        if(!empty($request->input('album_id'))) {

            $album_id = $request->input('album_id');
            $album = Album::find($album_id);

            $song->album()->associate($album);

        } else {

            $song->album()->dissociate();
        }

        $song->save();

        /*
        $data = $request->all();

        $song->update($data);

        $song->save();
        */
        
        return redirect()->route('admin.songs.index')->with('success', 'Salvataggio avvenuto correttamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('admin.songs.index')->with('success', 'Cancellazione avvenuta correttamente'); 
    }
}
