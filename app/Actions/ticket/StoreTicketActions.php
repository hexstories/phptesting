<?php

namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Http\Request;

class StoreTicketActions
{
    public function execute(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable|string|in:open,in_progress,closed',
            'priority' => 'nullable|string|in:low,medium,high',
            'category' => 'nullable|string|in:bug,feature_request,support',
        ]);

$ticket = Ticket::create([
    'title' => $request->title,
    'description' => $request->description,
    'status' => $request->status ?? 'open',
    'priority' => $request->priority ?? 'medium',
    'category' => $request->category ?? 'general', 
    'user_id' => auth()->id(),
]);

return response()->json($ticket, 201);
}
}





