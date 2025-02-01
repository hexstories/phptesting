
<?php

namespace App\Actions\Ticket;

use Illuminate\Support\Facades\Auth;

class IndexTicketsAction
{
    public function execute()
    {
        return Auth::user()->tickets;
    }
}
