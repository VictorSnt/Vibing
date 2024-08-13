<?php

namespace App\Exceptions;

use Exception;

class RowAlreadyExistsException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(__('Já existe um registro idêntico!'));
    }
}
