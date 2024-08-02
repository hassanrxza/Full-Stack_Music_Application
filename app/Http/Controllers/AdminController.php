<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.admin');
    }

    public function artist()
    {
        $artists = DB::select("SELECT * FROM `artists` ");
        return view('pages.admin.newartist', compact('artists'));
    }

    public function addArtist(Request $request)
    {
        $id = uniqid();
        $name = $request->artistName;
        $desc = $request->artistDescription;
        DB::select("INSERT INTO `artists` VALUES('".$id."', '".$name."', '".$desc."') ");
        return redirect()->back()->with('msg', 'Artist added successfully');
    }

    public function album()
    {
        $artists = DB::select("SELECT * FROM `artists`");
        $albums = DB::select("SELECT album.id, album.name, album.description, album.release_date, artists.name artist FROM `album` JOIN artists ON artists.id = album.artist;");
        return view('pages.admin.newalbum', compact('albums', 'artists'));
    }

    public function addAlbum(Request $request)
    {
        $id = uniqid();
        $name = $request->albumName;
        $desc = $request->albumDescription;
        $date = $request->albumDate;
        $artist = $request->albumArtist;
        DB::select("INSERT INTO `album` VALUE('".$id."', '".$name."', '".$desc."', '".$date."', '".$artist."'); ");
        return redirect()->back()->with('msg', 'Album added successfully');
    }

    public function genres()
    {
        $genres = DB::select("SELECT * FROM `genre` ");
        return view('pages.admin.newgenre', compact('genres'));
    }

    public function addGenre(Request $request)
    {
        $id = uniqid();
        $name = $request->genreName;
        DB::select("INSERT INTO `genre` VALUES('".$id."', '".$name."'); ");
        return redirect()->back()->with('msg', 'Genre added successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
