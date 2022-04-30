@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen admins
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Admins</h4>
          <a href="{{ route('register') }}" class="float-right btn btn-sm btn-dark">Add</a>
        </div>
        <div>
          @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th class="">Action</th>
              </thead>
              <tbody>
                  @forelse($user as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ ($row->userType)?$row->userType :'-' }}</td>
                  <td class="d-flex">
                      <a href="{{ route('edit',$row->id) }}" class="btn btn-sm btn-info mr-1">Edit</a>
                      <form action="{{ route('deleteuser',$row->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <input type="hidden" name="id" value="{{ $row->id }}">
                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
                    @empty
                     <p class="text-danger">There no admins available.</p>
                    @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
@endpush