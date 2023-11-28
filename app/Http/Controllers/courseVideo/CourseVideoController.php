<?php

namespace App\Http\Controllers\courseVideo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseVideo;
use App\Services\FileUploades;

class CourseVideoController extends Controller
{
    public function index()
    {
        $data = CourseVideo::with('course')->get();
        return view('content.course-video.course-video-list',compact('data'));
    }


    public function create(){
        $courses = Course::get();
        return view('content.course-video.course-video-create',compact('courses'));
    }

    public function store(Request $request, FileUploades $fileUploades){

        $validated = $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'video_thumbnail' => 'nullable',
            'video_url' => 'required',
            'video_epsode_number' => 'required|numeric',
            'video_duration' => 'required',
            'description' => 'required',
            'public_private_status' => 'required',
        ]);
        $file = $fileUploades::fileUpload($request, 'video_thumbnail');
        $validated['video_thumbnail'] = $file;
        CourseVideo::create($validated);
        return redirect()->route('course-video-list')
            ->with('success', 'Course video created successfully.');
    }

    public function show($id){
        $courses = Course::get();
        $course_video = CourseVideo::find($id);
        return view('content.course-video.show-course-video',compact(['courses','course_video']));
    }

    public function edit($id){
        $courses = Course::get();
        $course_video = CourseVideo::find($id);
        return view('content.course-video.edit-course-video',compact(['courses','course_video']));
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'video_thumbnail' => 'nullable',
            'video_url' => 'required',
            'video_epsode_number' => 'required|numeric',
            'video_duration' => 'required',
            'description' => 'required',
            'public_private_status' => 'required',
            'status' => 'required',
        ]);
        CourseVideo::where("id", $id)->update($validated);
        return redirect()->route('course-video-list')
            ->with('success', 'Course video update successfully.');
    }



    public function destroy($id){
        $course_video = CourseVideo::findOrFail($id);
        if($course_video->delete()){
            return redirect()->route('course-video-list')
            ->with('success', 'Course video delete successfully.');
        }
    }

}
