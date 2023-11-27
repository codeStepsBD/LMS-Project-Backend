<?php

namespace App\Http\Controllers\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FileUploades;
use Illuminate\Support\Facades\Redirect;

class Courses extends Controller
{
    public function index()
    {
        $data = Course::with('author')->get();
        return view('content.course.course-list',compact('data'));
    }


    public function create(){
        $users = User::get();
        return view('content.course.course-create',compact('users'));
    }

    public function store(Request $request, FileUploades $fileUploades){
        $validated = $request->validate([
            'author_id' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'course_thumbnail' => 'required',
            'status' => 'required',
        ]);
        $file = $fileUploades::fileUpload($request, 'course_thumbnail');
        $validated['course_thumbnail'] = $file;
        Course::create($validated);
        return redirect()->route('pages-course-list')
            ->with('success', 'Course created successfully.');
    }

    public function show($id){
        $users = User::get();
        $course = Course::find($id);
        return view('content.course.course-details',compact('users','course'));
    }

    public function edit($id){
        $users = User::get();
        $course = Course::find($id);
        return view('content.course.course-edit',compact('users','course'));
    }

    public function update(Request $request, $id, FileUploades $fileUploades){

        $validated = $request->validate([
            'author_id' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);
        if($request->hasFile('course_thumbnail')) {
            $file = $fileUploades::fileUpload($request, 'course_thumbnail');
            $validated['course_thumbnail'] = $file;
        }
        Course::where("id", $id)->update($validated);
        return redirect()->route('pages-course-list')
            ->with('success', 'Course update successfully.');
    }



    public function destroy($id){
        $course_video = Course::findOrFail($id);
        if($course_video->delete()){
            return redirect()->route('pages-course-list')
            ->with('success', 'Course delete successfully.');
        }
    }

}
