@extends('templates.index')
@section('heading', 'Booking')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="/admin/booking" class="btn btn-warning btn-sm">Back</a>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-4">
            <img
              src="{{ asset($booking->proof_payment) }}"
              alt="{{ $booking->name }}"
              style="width: 100%; display: block; border: 1px solid #e5e5e5;"
            />
            @if ($booking->status == 'Proses')
            <div class="row mt-4">
              <div class="col-6">
                <a href="{{ route('booking.confirmation', $booking->id) }}" class="btn btn-success btn-sm btn-block"><i class="fas fa-check"></i> Confirmation</a>
              </div>
              <div class="col-6">
                <a href="{{ route('booking.reject', $booking->id) }}" class="btn btn-danger btn-sm btn-block"><i class="fas fa-times"></i> Reject</a>
              </div>
            </div>
            @endif
        </div>
        <div class="col-8">
          <div class="table-responsive">
            <table
              class="table table-bordered"
              id="dataTable"
              width="100%"
              cellspacing="0"
            >
              <thead>
                <tr>
                  <th>Name Member</th>
                  <th>Total</th>
                  <th>Bank From</th>
                  <th>Title</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $booking->member->first_name }} {{ $booking->member->last_name }}</td>
                  <td>$ {{ $booking->total }}</td>
                  <td>{{ $booking->bank_from }}</td>
                  <td>{{ $booking->item->title }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
