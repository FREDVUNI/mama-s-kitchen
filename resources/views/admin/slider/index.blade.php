@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen slider
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Slider
            <a href="{{ route('slider.create') }}" class="float-right btn btn-sm btn-dark">Add</a>
          </h4>
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
                <th></th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>created</th>
                <th class="">Action</th>
              </thead>
              <tbody>
                @forelse($sliders as $slider)
                 <tr>
                     <td>
                       <img src="/images/uploads/slider/{{ $slider->image }}" class="rounded-circle" height="50px" width="50px"/>
                      </td>
                     <td>{{ $slider->title }}</td>
                     <td>{{ $slider->subtitle }}</td>
                     <td>{{ $slider->created_at }}</td>
                     <td class="d-flex">
                       <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-sm btn-info mr-1">Edit</a>
                       <form action="{{ route('slider.destroy',$slider->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                     </td>
                 </tr>
                 @empty
                    <p class="text-danger">There is no slider available.</p>
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