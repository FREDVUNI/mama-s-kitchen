@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen Item
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Item</h4>
        </div>
        <div class="card-body">
            <form  class="user" method="post" action="{{ route('item.store') }}" id="create" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Item">Item</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Item Name" autocomplete="name" autofocus>
                    @error('name')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($category->name == $category->id)?'selected' :'' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Enter Item Price">
                    @error('price')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"  class="form-control @error('description') is-invalid @enderror"  placeholder="Enter Item Description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                        <input id="image" type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" accept=".jpg,.jpeg,.png,.gif">
                        <label for="image" class="custom-file-label text-dark">Upload Image</label>
                    </div>
                    @error('image')
                        <small class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <button type="submit" class="btn btn-info col-md-4 btn-user">
                        ADD ITEM
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