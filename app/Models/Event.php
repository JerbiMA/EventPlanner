<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'place',
        'capacity',
        'price',
        'is_free',
        'image',
        'status',
        'category_id',
        'created_by',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
        'is_free'    => 'boolean',
        'status'     => 'boolean',
    ];

    // 🔹 Creator (admin)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // 🔹 Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 🔹 Registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // 🔹 Users registered to this event
    public function users()
    {
        return $this->belongsToMany(User::class, 'registrations')
                    ->withTimestamps();
    }

    // 🔹 Remaining places
    public function remainingPlaces()
    {
        return $this->capacity - $this->registrations()->count();
    }
}
