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
          <h4 class="card-title"> category
            <a href="{{ route('category.create') }}" class="float-right btn btn-sm btn-dark">Add</a>
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
                <th>Category</th>
                <th>Slug</th>
                <th>created</th>
                <th class="">Action</th>
              </thead>
              <tbody>
                <?php $i =1; ?>
                @forelse($categories as $category)
                 <tr>
                     <td>
                       {{ $i++ }}
                      </td>
                     <td>{{ $category->name }}</td>
                     <td>{{ $category->slug }}</td>
                     <td>{{ $category->created_at }}</td>
                     <td class="d-flex">
                       <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-info mr-1">Edit</a>
                       <form action="{{ route('category.destroy',$category->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                     </td>
                 </tr>
                 @empty
                    <p class="text-danger">There is no category available.</p>
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