@extends('templates.index')
@section('heading', 'Booking')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        DataTables Example
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-bordered"
          id="dataTable"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th>No</th>
              <th>Invoice</th>
              <th>Date</th>
              <th>Title</th>
              <th>Name Member</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($booking as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>#{{ $data->invoice }}</td>
                <td>{{ date('d/m/Y', strtotime( $data->start_date)) }} - {{ date('d/m/Y', strtotime( $data->end_date)) }}</td>
                <td>{{ $data->item->title }}</td>
                <td>{{ $data->member->first_name }} {{ $data->member->last_name }}</td>
                <td>{{ $data->status }}</td>
                <td>
                    <a
                      href="{{ route('booking.show', $data->id) }}"
                      class="btn btn-success btn-sm btn-circle"
                      ><i class="fas fa-eye"></i
                    ></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
