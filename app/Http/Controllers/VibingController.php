<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;

class VibingController extends Controller
{
    use NotificationTrait;

    public function showAlbumSongs(Request $request, int $albumId = null)
    {
        /** @var Album|null $album */
        $album = Album::find($albumId);
        if ($albumId && $album) {
            $idColumn = 'album_id';
            $idValue = $albumId;
            $title = 'Listagem de Musicas Do Album: ' . $album->name;
            $this->notify([
                'icon' => 'success',
                'title' => 'Faixas de ' . $album->name
            ], true);
            
            return view('pages.vibing.songs', [
                'idColumn' => $idColumn,
                'idValue' => $idValue,
                'title' => $title
            ]);
        }
        $this->notify([
            'icon' => 'error',
            'title' => 'Oops, nenhum resultado encontrado' 
        ], true);
        return redirect()->back();
    }

    public function showArtistSongs(Request $request, int $artistId = null)
    {
        /** @var Artist|null $artist */
        $artist = Artist::find($artistId);

        if ($artistId && $artist) {
            $idColumn = 'artist_id';
            $idValue = $artistId;
            $title = 'Listagem de Musicas Do Cantor: ' . $artist->name;

            $this->notify([
                'icon' => 'success',
                'title' => 'Musicas de ' . $artist->name
            ], true);

            return view('pages.vibing.songs', [
                'idColumn' => $idColumn,
                'idValue' => $idValue,
                'title' => $title
            ]);

        }
        $this->notify([
            'icon' => 'error',
            'title' => 'Oops, nenhum resultado encontrado' 
        ], true);
        return redirect()->back();
    }

    public function showPlaylistSongs(Request $request, int $playlistId = null)
    {
        /** @var Playlist|null $playlist */
        $playlist = Playlist::find($playlistId);
        if ($playlistId && $playlist) {
            $idColumn = 'playlist_id';
            $idValue = $playlistId;
            $title = 'Listagem de Musicas Da Playlist: ' . $playlist->name;

            $this->notify([
                'icon' => 'success',
                'title' => 'Musicas da playlist ' . $playlist->name
            ], true);

            return view('pages.vibing.songs', [
                'idColumn' => $idColumn,
                'idValue' => $idValue,
                'title' => $title
            ]);
        }
        $this->notify([
            'icon' => 'error',
            'title' => 'Oops, nenhum resultado encontrado' 
        ], true);
        return redirect()->back();
    }
}