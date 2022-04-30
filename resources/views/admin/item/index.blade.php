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
          <h4 class="card-title"> Item
            <a href="{{ route('item.create') }}" class="float-right btn btn-sm btn-dark">Add</a>
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
                <th>Item</th>
                <th>Category</th>
                <th>Price</th>
                <th>created</th>
                <th class="">Action</th>
              </thead>
              <tbody>
                @forelse($items as $item)
                 <tr>
                     <td>
                       <img src="/images/uploads/item/{{ $item->image }}" class="rounded-circle" height="50px" width="50px"/>
                      </td>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->category->name }}</td>
                     <td>{{ $item->price }}</td>
                     <td>{{ $item->created_at }}</td>
                     <td class="d-flex">
                       <a href="{{ route('item.edit',$item->id) }}" class="btn btn-sm btn-info mr-1">Edit</a>
                       <form action="{{ route('item.destroy',$item->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                     </td>
                 </tr>
                 @empty
                    <p class="text-danger">There is no item available.</p>
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