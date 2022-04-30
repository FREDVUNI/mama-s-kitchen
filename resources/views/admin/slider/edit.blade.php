@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen edit slider
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Slider</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/uploads/slider/{{ $slider->image }}" alt="{{ $slider->slug }}" class="w-100">
                </div>
                <div class="col-md-8">
                    <form  class="user" method="post" action="{{ route('slider.update',$slider->id) }}" id="edit" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $slider->title }}" placeholder="Enter Slider Title" autocomplete="title" autofocus>
                            @error('title')
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subtitle">SubTitle</label>
                            <input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle')?? $slider->subtitle }}" placeholder="Enter Slider Subtitle">
                            @error('subtitle')
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input type="hidden" name="image" value="{{ $slider->image }}">
                                <input id="image" type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" accept=".jpg,.jpeg,.png,.gif" value="{{ $slider->image }}">
                                <label for="image" class="custom-file-label text-dark">Change Image</label>
                            </div>
                            @error('image')
                                <small class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group d-flex">
                            <button type="submit" class="btn btn-info col-md-4 btn-user">
                                UPDATE SLIDER
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
@endpush