@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">View Single Course Video Content</span>
  <a href="{{ route('course-video-list') }}" style="float: right;">Back</a>
</h4>
<!-- Basic Bootstrap Table -->
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <form>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Course</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="course_id" class="form-control" id="course_id" readonly>
                  <option value="">Select Course</option>
                  @foreach($courses as $value)
                      <option {{ ($course_video->id == $value->id) ? "selected" : "" }} value="{{$value->id}}">{{$value->title}}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-text error">
                  @error('course_id')
                    {{ $errors->first('course_id') }}
                  @enderror
                </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Video Title</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" readonly class="form-control" id="title" name="title" placeholder="Course Title" value="{{ $course_video->title }}">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Video URL</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input readonly type="url" id="video_url" name="video_url" class="form-control" value="{{ $course_video->video_url }}">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Video Epsode Number</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input readonly type="number" id="video_epsode_number" name="video_epsode_number" class="form-control" placeholder="Video epsode number" value="{{ $course_video->video_epsode_number }}">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Video Duration</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input readonly type="number" id="video_duration" name="video_duration" class="form-control" placeholder="Video duration" value="{{ $course_video->video_duration }}">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Video Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <textarea readonly id="description" name="description" class="form-control" placeholder="Description">{{ $course_video->description }}</textarea>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Video Status</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select readonly name="public_private_status" class="form-control" id="public_private_status">
                  <option value="">Select status</option>
                  <option {{ ($course_video->public_private_status == 1) ? "selected" : "" }} value="1">Public</option>
                  <option {{ ($course_video->public_private_status == 2) ? "selected" : "" }} value="2">Private</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<!--/ Basic Bootstrap Table -->

</div>
@endsection
