@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Edit</span>
</h4>
<!-- Basic Bootstrap Table -->
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <form method="POST" action="{{ route('course-video-update',$course_video->id) }}">
          @csrf()
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Course</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="course_id" class="form-control" id="course_id">
                  <option value="">Select Course</option>
                  @foreach($courses as $value)
                      <option {{ ($course_video->course_id == $value->id) ? "selected" : "" }} value="{{$value->id}}">{{$value->title}}</option>
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
                <input type="text" class="form-control" id="title" name="title" placeholder="Course Title" value="{{ $course_video->title }}">
              </div>
              <div class="form-text error">
                @error('title')
                  {{ $errors->first('title') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Video URL</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="url" id="video_url" name="video_url" class="form-control" value="{{ $course_video->video_url }}">
              </div>
              <div class="form-text error">
                @error('video_url')
                  {{ $errors->first('video_url') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Video Epsode Number</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="number" id="video_epsode_number" name="video_epsode_number" class="form-control" placeholder="Video epsode number" value="{{ $course_video->video_epsode_number }}">
              </div>
              <div class="form-text error">
                @error('video_epsode_number')
                  {{ $errors->first('video_epsode_number') }}
                @enderror
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Video Duration</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="time" id="video_duration" name="video_duration" class="form-control" placeholder="Video duration" value="{{ $course_video->video_duration }}">
              </div>
              <div class="form-text error">
                @error('video_duration')
                  {{ $errors->first('video_duration') }}
                @enderror
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Video Discription</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <textarea id="editor" name="description" id="" cols="30" rows="10">{{ $course_video->description }}</textarea>
              </div>
              <div class="form-text error">
                @error('description')
                  {{ $errors->first('description') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Video Status</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="public_private_status" class="form-control" id="public_private_status">
                  <option value="">Select status</option>
                  <option {{ ($course_video->public_private_status == 1) ? "selected" : "" }} value="1">Public</option>
                  <option {{ ($course_video->public_private_status == 2) ? "selected" : "" }} value="2">Private</option>
                </select>
              </div>
                <div class="form-text error">
                  @error('public_private_status')
                    {{ $errors->first('public_private_status') }}
                  @enderror
                </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Status</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="status" class="form-control" id="status">
                  <option value="">Select Status</option>
                  <option value="1" {{ ($course_video->status == 1) ? "selected" : "" }} >Publish</option>
                  <option value="2" {{ ($course_video->status == 2) ? "selected" : "" }}>Draft</option>
                </select>
              </div>
                <div class="form-text error">
                  @error('status')
                    {{ $errors->first('status') }}
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
