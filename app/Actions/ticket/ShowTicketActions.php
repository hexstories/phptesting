<?php


namespace App\Actions\Ticket;

use App\Models\Ticket;

class ShowTicketActions
{
    public function execute(Ticket $ticket)
    {
        return $ticket;
    }
}
