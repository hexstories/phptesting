<?php
namespace App\Http\Controllers;

use App\Actions\Ticket\IndexTicketActions;
use App\Actions\Ticket\StoreTicketActions;
use App\Actions\Ticket\ShowTicketActions;
use App\Actions\Ticket\UpdateTicketActions;
use App\Actions\Ticket\DeleteTicketActions;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(IndexTicketActions $indexTicketActions)
    {
        return $indexTicketActions->execute();
    }

    public function store(Request $request, StoreTicketActions $storeTicketActions)
    {
        return $storeTicketActions->execute($request);
    }

    public function show(Ticket $ticket, ShowTicketActions $showTicketActions)
    {
        return $showTicketActions->execute($ticket);
    }

    public function update(Request $request, Ticket $ticket, UpdateTicketActions $updateTicketActions)
    {
        return $updateTicketActions->execute($request, $ticket);
    }

    public function destroy(Ticket $ticket, DeleteTicketActions $deleteTicketActions)
    {
        return $deleteTicketActions->execute($ticket);
    }
}
