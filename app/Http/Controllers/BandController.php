<?php

namespace App\Http\Controllers;

use App\Band;
use App\Album;
use App\Http\Requests\BandRequest;
use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::with('albums')->orderBy('name', 'asc')->get();
        return view('bands.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BandRequest $request)
    {
        Band::create($request->except('_token'));
        flash()->success('The band was created.');
        return redirect()->route('bands.index');
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
        $band = Band::with('albums')->find($id);
        $albums = Album::all()->pluck('name', 'id');
        return view('bands.edit', compact('band', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BandRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BandRequest $request, $id)
    {
        $band = Band::with('albums')->findOrFail($id);
        $band->update($request->except('_token, album_list'));

        $newAlbumIds = $request->has('album_list') ? $request->input('album_list') : [];
        $this->changeBandsAssociatedAlbums($band, $newAlbumIds);

        flash()->success('The band was updated.');
        return redirect()->route('bands.index');
    }

    /**
     * Changes the the albums that are associated with the given $band.
     * All albums that are no longer associated with the given $band will be deleted.
     *
     * @param  Band  $band
     * @param  array  $newAlbumsIds
     */
    private function changeBandsAssociatedAlbums(Band $band, array $newAlbumsIds)
    {
        $currentAlbumIds = $band->albums->pluck('id')->toArray();

        $albumsToDelete = array_diff($currentAlbumIds, $newAlbumsIds);
        if (count($albumsToDelete) > 0)
        {
            Album::destroy($albumsToDelete);
        }

        $albumsToChange = array_diff($newAlbumsIds, $currentAlbumIds);
        if (count($albumsToChange) > 0)
        {
            Album::whereIn('id', $albumsToChange)->update(['band_id' => $band->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $band = Band::findOrFail($id);
        $band->albums()->delete();
        $band->delete();
    }
}
