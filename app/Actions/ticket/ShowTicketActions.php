<?php

namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class ShowTicketAction
{
    public function execute(Ticket $ticket): Ticket
    {
        if ($ticket->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return $ticket;
    }
}
