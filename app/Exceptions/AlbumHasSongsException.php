<?php

namespace App\Exceptions;

use Exception;

class AlbumHasSongsException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(__('Esse album ja tem musicas associadas e não pode ser apagado'));
    }
}
