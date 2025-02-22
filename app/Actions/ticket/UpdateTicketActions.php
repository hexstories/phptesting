<?php

namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateTicketAction
{
    public function execute(Request $request, Ticket $ticket)
    {
        if ($ticket->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'status' => 'sometimes|string|in:open,in_progress,closed',
            'priority' => 'sometimes|string|in:low,medium,high',
            'category' => 'sometimes|string|in:bug,feature_request,support',
        ]);

        $ticket->update($data);

        return $ticket;
    }
}


