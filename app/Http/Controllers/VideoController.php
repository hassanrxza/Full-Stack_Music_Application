<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $video = DB::select("SELECT songs.id, songs.name, songs.file, songs.description, songs.post_date ,category, genre_type genre, artists.name artist, album.name album FROM `songs` JOIN categories ON categories.id = songs.cat_id JOIN genre ON genre.id = songs.genre_id JOIN artists ON artists.id = songs.artist_id JOIN album ON album.id = songs.album_id WHERE songs.id = '".$id."' AND songs.cat_id = 2; ");
        $comments = DB::select("SELECT review_ratings.comments, review_ratings.created_at, users.name FROM `review_ratings` JOIN users ON users.id = review_ratings.userId WHERE songId = '".$id."' ORDER BY created_at ASC;");
        return view('pages.home.video.show', compact('video', 'comments'));
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
