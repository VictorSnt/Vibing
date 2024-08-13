<?php

namespace App\Service;


class ArtistService
{

    static function filterFields($component, $fields): array
    {
        if (isset($fields['image']) && $fields['image']) {
            
            $path = $component->image->store('images', 'public');
            $fields['image'] = $path;
        }
        return $fields;
    }
}
