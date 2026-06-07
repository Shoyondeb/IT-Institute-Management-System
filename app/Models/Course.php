<?php
// app/Models/Course.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'fee',
        'image',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->withTimestamps();
    }
    public function videos()
    {
        return $this->hasMany(CourseVideo::class)->orderBy('order');
    }
    public function scopeWithVideosCount($query)
    {
        return $query->withCount('videos');
    }
    public function activeVideos()
    {
        return $this->hasMany(CourseVideo::class)
            ->where('is_active', true)
            ->orderBy('order');
    }
}
