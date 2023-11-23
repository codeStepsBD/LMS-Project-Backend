<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
