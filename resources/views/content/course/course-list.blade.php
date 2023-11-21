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
          <td>{{ $value->author_id }}</td>
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
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
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
