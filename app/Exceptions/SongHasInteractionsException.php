<?php

namespace App\Exceptions;

use Exception;

class SongHasInteractionsException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(__('Essa Musica tem registros de interações, Não pode ser apagada!'));
    }
}
