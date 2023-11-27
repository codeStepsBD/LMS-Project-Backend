@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Course List</span>
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  @if(Session::has('success'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
  @endif
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Course Title</th>
          <th>Author</th>
          <th>Category</th>
          <th>Total Lessions</th>
          <th>Course Duration</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if(isset($data))
        @foreach($data as $value)
        <tr>
          <td>{{ $value->title }}</td>
          <td>{{ $value->author->name }}</td>
          <td>{{ $value->category }}</td>
          <td>{{ $value->total_lesson }}</td>
          <td>{{ $value->duration }}</td>
          <td>
            @if($value->status == 1)
              <span class="badge bg-label-primary me-1">Active</span>
            @else
            <span class="badge bg-label-primary me-1">Inactive</span>
            @endif
          </td>
          <td>
            <div class="dropdown">
              <a href="{{ route('course-edit',$value->id) }}"><i class="bx bxs-edit"></i></a>
              <a href="{{ route('course-details',$value->id) }}"><i class="bx bxs-low-vision"></i></a>
              <a onclick="return confirm('Are you sure want to delete');" href="{{ route('course-delete',$value->id) }}"><i class="bx bxs-message-square-x"></i></a>
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
