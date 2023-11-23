@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Course Video List</span>
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Course Title</th>
          <th>Video Title</th>
          <th>Video Epsode Number</th>
          <th>Video duration</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if(isset($data))
        @foreach($data as $value)
        <tr>
          <td>{{ $value->id }}</td>
          <td>{{ $value->title }}</td>
          <td>{{ $value->video_epsode_number }}</td>
          <td>{{ $value->video_duration }}</td>
          <td>
            @if($value->status == 1)
              <span class="badge bg-label-primary me-1">Active</span>
            @else
            <span class="badge bg-label-primary me-1">Inactive</span>
            @endif
          </td>
          <td>
            <div class="dropdown">
              <box-icon name='edit'></box-icon>
            </div>
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="5">Data is not available</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->

</div>
@endsection
