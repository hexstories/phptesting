<?php


namespace App\Actions\Ticket;

use App\Models\Ticket;

class IndexTicketActions
{
public function execute()
{
return Ticket::all();
}
}
