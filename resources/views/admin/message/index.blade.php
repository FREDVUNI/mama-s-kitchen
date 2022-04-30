@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen messages
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Messages
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
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th></th>
              </thead>
              <tbody>
                @forelse($messages as $message)
                 <tr>
                    <td>{{ $message->name }}</td>
                     <td>{{ $message->email }}</td>
                     <td>{{ str_limit($message->message,5) }}</td>
                     <td>{{ $message->created_at }}</td>
                     <td class="d-flex">
                        <a href="{{ route('message.show',$message->id) }}" class="btn btn-dark btn-sm mr-1">Details</a>
                        <form action="{{ route('message.delete',$message->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                     </td>
                 </tr>
                 @empty
                    <p class="text-danger">There is no message available.</p>
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