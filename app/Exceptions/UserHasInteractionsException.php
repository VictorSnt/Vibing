<?php

namespace App\Exceptions;

use Exception;

class UserHasInteractionsException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(__('Esse Usuario tem registros de interações, Não pode ser apagado'));
    }
}
