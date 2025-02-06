<?php

namespace App\Http\Controllers;
use App\Models\TicketComment;
use Illuminate\Http\Request;

class TicketCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'content' => 'required|string',
        ]);

        $comment = TicketComment::create([
            'ticket_id' => $request->ticket_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return response()->json($comment, 201);
    }

    public function index($ticketId)
    {
        $comments = TicketComment::where('ticket_id', $ticketId)->with('user')->get();
        return response()->json($comments);
    }
}
