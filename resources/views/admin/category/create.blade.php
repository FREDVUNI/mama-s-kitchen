@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen category
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Category</h4>
        </div>
        <div class="card-body">
            <form  class="user" method="post" action="{{ route('category.store') }}" id="create">
                @csrf
                <div class="form-group">
                    <label for="category">Category</label>
                    <input id="category" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter category name" autocomplete="title" autofocus>
                    @error('name')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <button type="submit" class="btn btn-info col-md-4 btn-user">
                        ADD CATEGORY
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
@endpush