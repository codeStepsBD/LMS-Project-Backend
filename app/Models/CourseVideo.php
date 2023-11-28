<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'video_thumbnail',
        'video_url',
        'video_epsode_number',
        'video_duration',
        'description',
        'public_private_status',
        'status',
      ];

      public function course(){
        return $this->belongsTo(Course::class, 'course_id','id');
      }
}
