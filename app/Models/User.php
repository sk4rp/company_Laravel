<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function events()
    {
        return $this->belongsToMany(EventParticipant::class, 'event_participants');
    }
}
