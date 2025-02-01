<?php

namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DeleteTicketAction
{
    public function execute(Ticket $ticket): \Illuminate\Http\JsonResponse
    {
        if ($ticket->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $ticket->delete();

        return response()->json(null, 204);
    }
}
