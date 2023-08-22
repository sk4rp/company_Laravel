<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    public $table = 'event_categories';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(EventCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(EventCategory::class, 'parent_id');
    }

    public function userEvents()
    {
        return $this->belongsToMany(UserEvent::class, 'event_category_user_event');
    }
}
