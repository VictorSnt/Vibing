<?php

use App\Http\Controllers\AppVibingController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::view(
        uri: '/login', 
        view: 'pages.auth.login'
    )->name('login');
    
    Route::view(
        uri: '/registrar', 
        view: 'pages.user.store'
    )->name('register');
    
    Route::view(
        uri: '/esqueceu_a_senha', 
        view: 'pages.auth.password-link'
    )->name('password.request');
    
    Route::view(
        uri: '/resetar_senha/{token}/{email}',
        view: 'pages.auth.password-reset',
        data: ['token' => $token ?? '', 'email' => $email ?? '']
    )->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get(
        uri: '/logout',
        action: function () {
            Auth::logout();
            return redirect()->route('login');
        }
    )->name('logout');

    Route::get('/', [AppVibingController::class, 'show'])->name('vibing-index');

    Route::view(uri: '/atualizar-perfil', view: 'pages.user.update')->name('profile-update');

    Route::view(uri: '/atualizar_senha', view: 'pages.user.password')->name('profile-password');

    Route::view(uri: '/deletar-perfil', view: 'pages.user.delete')->name('profile-delete');

    Route::view(uri: '/dashboard-playlists', view: 'pages.playlist.index')->name('playlist-index');
    
    // music listage to like and add to playlist
    
});

Route::middleware([CheckAdmin::class])->group(function () {

    Route::view(uri: '/listagem-usuarios', view: 'pages.user.users-listage')->name('listusers-index');
    
    Route::view(uri: '/dashboard-artistas', view: 'pages.artist.index')->name('artist-index');

    Route::get('/dashboard-album/{artistId?}', function ($artistId = null) {
        return view('pages.album.index', ['artistId' => $artistId]);
    })->name('album-index');
    // Route::view(uri: '/dashboard-album', view: 'pages.album.index')->name('album-index');
    
    Route::get('/dashboard-musics/{albumId?}', function ($albumId = null) {
        return view('pages.song.index', ['albumId' => $albumId]);
    })->name('song-index');
    //Route::view(uri: '/dashboard-musics', view: 'pages.song.index')->name('song-index');

});


Route::fallback(function () {
    return redirect()->route('vibing-index');
});
