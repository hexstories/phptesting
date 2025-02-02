<?php

namespace App\Actions\ticket;

use Illuminate\Support\Facades\Auth;

class IndexTicketActions
{
    public function execute()
    {
        return Auth::user()->tickets;
    }
}
