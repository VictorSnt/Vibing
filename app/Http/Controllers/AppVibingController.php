<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppVibingController extends Controller
{
    public function show()
    {
        $songs = Song::inRandomOrder()
            ->limit(10)
            ->get();


        return view('pages.vibing.home', [
            'songs' => $songs,
        ]);
    }
}
