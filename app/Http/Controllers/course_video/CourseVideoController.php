<?php

namespace App\Http\Controllers\course_video;

use App\Models\course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseVideo;

class CourseVideoController extends Controller
{
    public function index()
    {
        $data = CourseVideo::get();
        return view('content.course-video.course-video-list',compact('data'));
    }


    public function create(){
        return view('content.course-video.course-create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'video_thumbnail' => 'nullable',
            'video_url' => 'required',
            'video_epsode_number' => 'required|numeric',
            'video_duration' => 'required|numeric',
            'public_private_status' => 'required',
        ]);

        CourseVideo::create($validated);
        return redirect()->route('course-video-list')
            ->with('success', 'Course video created successfully.');
    }

}
