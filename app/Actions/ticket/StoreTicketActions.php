<?php

namespace App\Actions\Ticket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreTicketAction
{
    public function execute(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        return Auth::user()->tickets()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => 'open',
        ]);
    }
}
