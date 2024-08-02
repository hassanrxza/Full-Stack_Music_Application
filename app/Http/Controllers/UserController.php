<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.home.index');
    }

    public function redirect ()
    {

        $user_role = Auth::user()->role;
        $user_name = Auth::user()->name;

        if ($user_role == "Admin")
        {
            return redirect()->to('/dashboard')->with('message', 'Logged in as Admin');
        }
        else
        {
            return redirect()->to('/')->with('message', 'Logged in as '. $user_name);
        };
    }

    public function contact ()
    {
        return view('pages.home.contact');
    }


    public function about ()
    {
        return view('pages.home.about');
    }

    public function albums ()
    {
        return view('pages.home.albums');
    }

    public function video()
    {
        $videos = DB::select("SELECT `id`, `name`, `description`, `file` FROM `songs` WHERE cat_id = 2 ");

        return view('pages.home.video', compact('videos'));
    }

    public function audio()
    {
        $audios = DB::select("SELECT `id`, `name`, `description`, `file` FROM `songs` WHERE cat_id = 1");
        return view('pages.home.audio', compact('audios'));
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
