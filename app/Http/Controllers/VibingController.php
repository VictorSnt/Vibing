<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class VibingController extends Controller
{
    public function showAlbumSongs(Request $request, $albumId = null, $artistId = null)
    {
  
        if ($albumId) {
            $songs = Song::where('album_id', $albumId)->get();
            $title = 'Listagem de Musicas Do Album: ' . Album::find($albumId)->name ?? '';
        
        } else {
           return;
        }

        return view('pages.vibing.songs', [
            'songs' => $songs,
            'title' => $title
        ]);
    }

    public function showArtistSongs(Request $request, $artistId = null)
    {
        if ($artistId) {
            $songs = Song::where('artist_id', $artistId)->get();
            $title = 'Listagem de Musicas Do Cantor: ' . Artist::find($artistId)->name ?? '';

        } else {
            redirect()->back();
        }
        return view('pages.vibing.songs', [
            'songs' => $songs,
            'title' => $title
        ]);
    }

    public function showPlaylistSongs(Request $request, $playlistId = null)
    {
        if ($playlistId) {
            $playlist = Playlist::find($playlistId);
            $songs = $playlist ? $playlist->songs : [];
            $title = 'Listagem de Musicas Da Playlist: ' . $playlist->name ?? '';

        } else {
            redirect()->back();
        }
        return view('pages.vibing.songs', [
            'songs' => $songs,
            'title' => $title
        ]);
    }
}
