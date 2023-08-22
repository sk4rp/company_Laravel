<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    public $table = 'event_participants';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id'
    ];

    public function event()
    {
        return $this->belongsTo(CommercialEvent::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
