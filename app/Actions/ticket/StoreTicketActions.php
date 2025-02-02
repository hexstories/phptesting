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
        ]);

//        return Ticket::create([
//            'title' => $request->title,
//            'description' => $request->description,
//            'user_id' => auth()->id(),
//        ]);
//
//    }
//}

$ticket = Ticket::create([
    'title' => $request->title,
    'description' => $request->description,
    'user_id' => auth()->id(), // Assuming you're using authentication
]);

return response()->json($ticket, 201);
}
}
