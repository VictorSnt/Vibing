<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use Illuminate\Http\Request;

class VibingController extends Controller
{
    public function showAlbumSongs(Request $request, $albumId = null)
    {
        /** @var Album|null $album */
        $album = Album::find($albumId);
        if ($albumId && $album) {
            $idColumn = 'album_id';
            $idValue = $albumId;
            $title = 'Listagem de Musicas Do Album: ' . $album->name;
            return view('pages.vibing.songs', [
                'idColumn' => $idColumn,
                'idValue' => $idValue,
                'title' => $title
            ]);
        }
        return redirect()->back();
    }

    public function showArtistSongs(Request $request, $artistId = null)
    {
        /** @var Artist|null $artist */
        $artist = Artist::find($artistId);

        if ($artistId && $artist) {
            $idColumn = 'artist_id';
            $idValue = $artistId;
            $title = 'Listagem de Musicas Do Cantor: ' . $artist->name;
            return view('pages.vibing.songs', [
                'idColumn' => $idColumn,
                'idValue' => $idValue,
                'title' => $title
            ]);

        }
        return redirect()->back();
    }

    public function showPlaylistSongs(Request $request, $playlistId = null)
    {
        /** @var Playlist|null $playlist */
        $playlist = Playlist::find($playlistId);
        if ($playlistId && $playlist) {
            $idColumn = 'playlist_id';
            $idValue = $playlistId;
            $title = 'Listagem de Musicas Da Playlist: ' . $playlist->name;
            return view('pages.vibing.songs', [
                'idColumn' => $idColumn,
                'idValue' => $idValue,
                'title' => $title
            ]);
        } 
        return redirect()->back();
    }
}