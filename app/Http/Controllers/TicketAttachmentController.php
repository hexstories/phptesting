<?php
namespace App\Http\Controllers;

use App\Models\TicketAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketAttachmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'file' => 'required|file|max:2048',
        ]);

        $path = $request->file('file')->store('attachments', 'public');

        $attachment = TicketAttachment::create([
            'ticket_id' => $request->ticket_id,
            'user_id' => auth()->id(),
            'file_path' => $path,
            'file_type' => $request->file->getClientMimeType(),
        ]);

        return response()->json(['message' => 'File uploaded successfully', 'attachment' => $attachment], 201);
    }

    public function download($id)
    {
        $attachment = TicketAttachment::findOrFail($id);
        return Storage::download($attachment->file_path);
    }
}
