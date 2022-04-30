@extends('layouts.app')

@push('css')
@endpush

@section('title')
    mama'skitchen dashboard
@endsection

@section('content')
<div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
  </div>
    <div class="content">
    <div class="row">
      <div class="col-lg-3">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">{{ $categorycount }}/{{ $itemcount }} items</h5>
            <h4 class="card-title">Categories<br>Items</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i>
              <a href="{{ route("category.index") }}">view</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">{{ $slidercount }} sliders</h5>
            <h4 class="card-title">All<br>Slider</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i>
              <a href="{{ route("slider.index") }}">view</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">{{ $itemcount }} Items</h5>
            <h4 class="card-title">All<br>Items</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i>
              <a href="{{ route("item.index") }}">view</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">{{ $reservationcount }} Reservations</h5>
            <h4 class="card-title">All<br>Reservations</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i>
              <a href="{{ route("reservations") }}">view</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Reservations
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
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Date|Time</th>
                  <th></th>
                </thead>
                <tbody>
                  @forelse($reservations as $reservation)
                   <tr>
                      <td>{{ $reservation->name }}</td>
                       <td>{{ $reservation->phone }}</td>
                       <td>{{ $reservation->email }}</td>
                       <td>{{ str_limit($reservation->message,5) }}</td>
                       <td>
                           @if($reservation->status == True)
                              <span class="btn btn-sm btn-success">Confirmed</span>
                           @else
                              <span class="btn btn-sm btn-danger">Not Confirmed</span>
                           @endif
                       </td>
                       <td>{{ $reservation->date_time }}</td>
                       <td class="d-flex">
                          @if($reservation->status == True)
                              <form action="{{ route('reservation.delete',$reservation->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                          @else
                              <form action="{{ route('reservation.status',$reservation->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-dark">Confirm</button>
                              </form>
                          @endif
                       </td>
                   </tr>
                   @empty
                      <p class="text-danger">There is no reservation available.</p>
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