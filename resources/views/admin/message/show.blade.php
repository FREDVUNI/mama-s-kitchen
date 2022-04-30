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
          <h4 class="card-title"> Message
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
              <tr>
                <td><strong>Name</strong></td>
                <td>{{ $msg->name }}</td>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td>{{ $msg->email }}</td>
              </tr>
              <tr>
                <td><strong>Subject</strong></td>
                <td>{{ $msg->subject }}</td>
              </tr>
              <tr>
                <td><strong>Message</strong></td>
                <td>{{ $msg->message }}</td>
              </tr>
            </table>

            <div>
              <a href="{{ route('messages') }}" class="btn btn-dark btn-sm">Back</a>
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