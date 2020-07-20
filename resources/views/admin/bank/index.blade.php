@extends('templates.index')
@section('heading', 'Bank')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary btn-sm"
      data-toggle="modal"
      data-target="#add-modal"
    >
      <i class="fas fa-plus"></i>
    </button>
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
            <th>Name Bank</th>
            <th>Nomor Rekening</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bank as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->name_bank }}</td>
              <td>{{ $data->nomor_rekening }}</td>
              <td>{{ $data->name }}</td>
              @if ($data->image)
                <td>
                  <img
                    src="{{ asset($data->image) }}"
                    alt="{{ $data->name }}"
                    width="70"
                  />
                </td>
              @else
                <td></td>
              @endif
              <td>
                <form action="{{ route('bank.destroy', $data->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <a
                    href="javascript:void()"
                    type="button"
                    class="btn btn-warning btn-sm btn-circle btn-update"
                    data-id="{{ $data->id }}"
                    data-name-bank="{{ $data->name_bank }}"
                    data-nomor-rekening="{{ $data->nomor_rekening }}"
                    data-name="{{ $data->name }}"
                    ><i class="fas fa-edit"></i
                  ></a>
                  <button
                    type="submit"
                    class="btn btn-danger btn-sm btn-circle"
                    onclick="return confirm('Yakin');"
                  >
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('modal')
  <!-- Add Modal -->
  @include('admin.bank.add-modal')
  <!-- Edit Modal -->
  @include('admin.bank.edit-modal')
@endsection
@section('script')
<script>
  function inputAngka(e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
    return true;
  }
  
  $("#dataTable").on("click", ".btn-update", function () {
    let id = $(this).data("id");
    let nameBank = $(this).data("name-bank");
    let nomorRekening = $(this).data("nomor-rekening");
    let name = $(this).data("name");
    $("#edit-modal").modal("show");
    $(".id").val(id);
    $(".name_bank").val(nameBank);
    $(".nomor_rekening").val(nomorRekening);
    $(".name").val(name);
  });
</script>
@endsection
