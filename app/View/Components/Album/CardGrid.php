<?php

namespace App\View\Components\Album;

use App\Models\Album;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardGrid extends Component
{
    
    public function render(): View|Closure|string
    {
        $albums = Album::inRandomOrder()
            ->limit(4)
            ->get();
        return view('components.album.card-grid', [
            'albums' => $albums
        ]);
    }
}
