<?php

namespace App\View\Components\Album;

use App\Models\Album;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardGrid extends Component
{
    public function getAlbuns()
    {
        return Album::inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function render(): View|Closure|string
    {
        $data = $this->getAlbuns();
        
        return view('components.album.card-grid', [
            'albums' => $data ? $data : []
        ]);
    }
}
