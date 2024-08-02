<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == "Admin"){
        $genres = DB::select("SELECT * FROM `genre`");
        $albums = DB::select("SELECT * FROM album");
        $artists = DB::select("SELECT * FROM artists");
        $categories = DB::select("SELECT * FROM categories");
        $posts = DB::select("SELECT songs.id, songs.name, songs.file, songs.description, songs.post_date ,category, genre_type genre, artists.name artist, album.name album FROM `songs` JOIN categories ON categories.id = songs.cat_id JOIN genre ON genre.id = songs.genre_id JOIN artists ON artists.id = songs.artist_id JOIN album ON album.id = songs.album_id;");
        return view('pages.admin.posts', compact('categories','posts', 'genres', 'albums', 'artists'));
        }
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
        $id = uniqid();
        $name = $request->postName;
        $description = $request->postDescription;
        $category = $request->postCat;
        $album = $request->postAlbum;
        $date = $request->postDate;
        $genre = $request->postGenre;
        $artist_id = $request->postArtist;


        $ext =   $request->postLink->getClientOriginalExtension();
        $file = $id . '.' . $ext;

        if($category == 1){

            $request->postLink->move(public_path('assets/audio'), $file);
        }
        elseif($category == 2)
        {
            $request->postLink->move(public_path('assets/video'), $file);
        }

        DB::select("INSERT INTO `songs`(`id`,`name`, `file` , `cat_id`, `album_id`, `post_date`, `description`,
        `artist_id`, `genre_id`) VALUES ('".$id."','".$name."', '".$file."' ,'".$category."', '".$album."', '".$date."',
        '".$description."', '".$artist_id."' ,'".$genre."')");

        return redirect()->back()->with('message', 'Post added successfully');

    }

    public function reviewrating(Request $request)
    {
        $postid = $request->postid;
        $comment = $request->comment;
        $star_rating = 0;
        $userid = Auth::user()->id;
        $timestamp = Carbon::now();
        DB::select("INSERT INTO `review_ratings`(`songId`, `comments`, `star_rating`, `userId`, `created_at`) VALUES('".$postid."', '".$comment."', '".$star_rating."', '".$userid."', '".$timestamp."' );");
        return redirect()->back()->with('message', 'Post added successfully');
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
        $data = DB::select("SELECT * FROM `songs` WHERE songs.id = '".$id."';");
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $postid = $request->editPostId;
        $name = $request->editPostName;
        $description = $request->editPostDescription;
        $cat = $request->editPostCat;
        $album = $request->editPostAlbum;
        $artist = $request->editPostArtist;
        $date = $request->editPostDate;
        $genre = $request->editPostGenre;

        DB::select("UPDATE `songs` SET `name`='".$name."',`cat_id`='".$cat."',`album_id`='".$album."',`post_date`='".$date."',`description`='".$description."',`artist_id`='".$artist."',`genre_id`='".$genre."' WHERE id = '".$postid."' ");

        return redirect()->back()->with('message', 'Post changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
