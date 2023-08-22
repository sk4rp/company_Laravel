<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    public $table = 'user_events';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'start_time',
        'end_time',
        'location',
        'min_participants',
        'max_participants',
        'min_age',
        'max_age',
        'gender_specific',
    ];

    public function categories()
    {
        return $this->belongsToMany(EventCategory::class, 'event_category_user_event');
    }

    public function participants()
    {
        return $this->hasMany(EventParticipant::class);
    }

}
