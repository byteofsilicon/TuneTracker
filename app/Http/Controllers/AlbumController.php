<?php

namespace App\Http\Controllers;

use App\Band;
use App\Album;
use App\Http\Requests\AlbumRequest;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource. Filtered by bands if specified
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $albumQuery = Album::with('band');
        if ($request->has('bands'))
        {
            $albumQuery = $albumQuery->where('band_id', $request->input('bands'));
        }

        $albums = $albumQuery->get();
        $bands = Band::all()->pluck('name', 'id');
        return view('albums.index', compact('albums', 'bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bands = Band::all()->pluck('name', 'id');
        return view('albums.create', compact('bands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        Album::create($request->except('_token'));
        flash()->success('The album was created.');
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::with('band')->find($id);
        $bands = Band::all()->pluck('name', 'id');
        return view('albums.edit', compact('bands', 'album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AlbumRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, $id)
    {
        Album::findOrFail($id)->update($request->except('_token'));
        flash()->success('The album was updated.');
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::destroy($id);
        flash()->success('The album was deleted.');
    }
}
