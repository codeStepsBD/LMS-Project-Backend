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
        <form method="POST" action="{{ route('course-store') }}">
          @csrf()
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Course Title</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" class="form-control" id="title" name="title" placeholder="Course Title" aria-label="Course Title">
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
                  <option value="1">Abc Author</option>
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
                  <option value="laravel">Laravel Developer</option>
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
            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Total Lesson</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" id="total_lesson" name="total_lesson" class="form-control" placeholder="total_lesson">
              </div>
              <div class="form-text error">
                @error('total_lesson')
                  {{ $errors->first('total_lesson') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Course Duration</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" id="duration" name="duration" class="form-control" placeholder="Duration">
              </div>
              <div class="form-text error">
                @error('duration')
                  {{ $errors->first('duration') }}
                @enderror
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Course Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
              </div>
              <div class="form-text error">
                @error('description')
                  {{ $errors->first('description') }}
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
