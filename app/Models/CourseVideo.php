<?php
// app/Models/CourseVideo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'video_path',
        'duration',
        'order',
        'is_active'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
