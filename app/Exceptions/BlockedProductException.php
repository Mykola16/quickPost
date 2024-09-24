<?php

namespace App\Exceptions;

use Exception;

class BlockedProductException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.blocked-product', [], 403);
    }
}
