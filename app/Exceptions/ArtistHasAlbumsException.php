<?php

namespace App\Exceptions;

use Exception;

class ArtistHasAlbumsException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(__('local.ArtistHasAlbum'));
    }
}
