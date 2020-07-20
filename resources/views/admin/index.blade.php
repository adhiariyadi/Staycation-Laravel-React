@extends('templates.index')
@section('heading', 'Dashboard')
@section('content')
<div class="row">
  <!-- Member Card Example -->
  <div class="col-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-xs font-weight-bold text-primary text-uppercase mb-1"
            >
              Member
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              {{ $member }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Order Card Example -->
  <div class="col-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-xs font-weight-bold text-primary text-uppercase mb-1"
            >
              Order
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              {{ $booking }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-gem fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Item Card Example -->
  <div class="col-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-xs font-weight-bold text-primary text-uppercase mb-1"
            >
              Item
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              {{ $item }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-hotel fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
