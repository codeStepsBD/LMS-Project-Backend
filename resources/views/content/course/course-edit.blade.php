@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Create New Course</span>
</h4>
<!-- Basic Bootstrap Table -->
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <form method="POST" action="{{ route('course-update', $course->id) }}" enctype="multipart/form-data">
          @csrf()
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Course Title</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" class="form-control" id="title" name="title" placeholder="Course Title" value="{{ $course->title }}">
              </div>
              <div class="form-text error">
                @error('title')
                  {{ $errors->first('title') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Course Author</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="author_id" class="form-control" id="author">
                  <option value="">Select Author</option>
                  @foreach($users as $user)
                    <option {{ ($course->author_id == $user->id)? 'selected':"" }} value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-text error">
                  @error('author_id')
                    {{ $errors->first('author_id') }}
                  @enderror
                </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Course Category</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="category" class="form-control" id="category">
                  <option value="">Select Category</option>
                  <option {{ ($course->category == '1')? 'selected':"" }} value="1">Laravel Developer</option>
                </select>
              </div>
              <div class="form-text error">
                @error('category')
                  {{ $errors->first('category') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Course Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <textarea id="editor" name="description" class="form-control">{{ $course->description }}</textarea>
              </div>
              <div class="form-text error">
                @error('description')
                  {{ $errors->first('description') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Status</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="status" class="form-control" id="status">
                  <option {{ ($course->status == '1')? 'selected':"" }} value="1">Published</option>
                  <option {{ ($course->status == '2')? 'selected':"" }} value="2">Draft</option>
                </select>
              </div>
              <div class="form-text error">
                @error('status')
                  {{ $errors->first('status') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Course Thumbnail</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="file" id="course_thumbnail" name="course_thumbnail" class="form-control">
              </div>
              <div class="form-text error">
                @error('course_thumbnail')
                  {{ $errors->first('course_thumbnail') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<!--/ Basic Bootstrap Table -->

</div>
@endsection
