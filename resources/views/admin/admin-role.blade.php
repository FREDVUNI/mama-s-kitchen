@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen edit
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Edit Admin Role</h4>
        </div>
        <div class="card-body">
            <form  class="user" method="post" action="{{ route('updateuser',$user->id) }}" id="edit">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" autocomplete="email" autofocus readonly>
                    @error('email')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Username</label>
                    <input id="name" value="{{ $user->name }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" autocomplete="name" autofocus>
                    @error('name')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="userType">User Type</label>
                    <select name="userType" id="userType" class="form-control @error('userType') is-invalid @enderror">
                        <option value="">Choose a user type</option>
                        <option value="admin" {{ ($user->userType == 'admin')?'selected' :'' }}>Admin</option>
                        <option value="vendor" {{ ($user->userType == 'vendor')?'selected' :'' }}>Vendor</option>
                        <option value="-" {{ ($user->userType == '-')?'selected' :'' }}>None</option>
                    </select>
                    @error('userType')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info col-md-4 btn-user w-50 btn-block mt-5">
                    UPDATE
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
@endpush

