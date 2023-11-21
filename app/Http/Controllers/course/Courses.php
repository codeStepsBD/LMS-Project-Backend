<?php

namespace App\Http\Controllers\course;

use App\Models\course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class Courses extends Controller
{
    public function index()
    {
        $data = Course::get();
        return view('content.course.course-list',compact('data'));
    }


    public function create(){
        return view('content.course.course-create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'author_id' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'total_lesson' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);

        course::create($validated);
        return redirect()->route('pages-course-list')
            ->with('success', 'Post created successfully.');
    }

}
