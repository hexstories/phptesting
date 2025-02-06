<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TicketAttachment extends Model
{
use HasFactory;

protected $fillable = ['ticket_id', 'user_id', 'file_path', 'file_type'];

public function ticket()
{
return $this->belongsTo(Ticket::class);
}

public function user()
{
return $this->belongsTo(User::class);
}

public function getFileUrlAttribute()
{
return Storage::url($this->file_path);
}
}
