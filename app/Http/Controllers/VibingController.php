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
            $idColumn = 'album_id';
            $idValue = $albumId;
            $title = 'Listagem de Musicas Do Album: ' . Album::find($albumId)->name ?? '';
        
        } else {
           return;
        }

        return view('pages.vibing.songs', [
            'idColumn' => $idColumn,
            'idValue' => $idValue,
            'title' => $title
        ]);
    }

    public function showArtistSongs(Request $request, $artistId = null)
    {
        if ($artistId) {
            $idColumn = 'artist_id';
            $idValue = $artistId;
            $title = 'Listagem de Musicas Do Cantor: ' . Artist::find($artistId)->name ?? '';

        } else {
            redirect()->back();
        }
        return view('pages.vibing.songs', [
            'idColumn' => $idColumn,
            'idValue' => $idValue,
            'title' => $title
        ]);
    }

    public function showPlaylistSongs(Request $request, $playlistId = null)
    {
        if ($playlistId) {
            $idColumn = 'playlist_id';
            $idValue = $playlistId;
            $title = 'Listagem de Musicas Da Playlist: ' . Playlist::find($playlistId)->name ?? '';

        } else {
            redirect()->back();
        }
        return view('pages.vibing.songs', [
            'idColumn' => $idColumn,
            'idValue' => $idValue,
            'title' => $title
        ]);
    }
}
