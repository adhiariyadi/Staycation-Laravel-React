@extends('templates.index')
@section('heading', 'Category')
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
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->name }}</td>
              <td>
                <form action="{{ route('category.destroy', $data->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <a
                    href="javascript:void()"
                    type="button"
                    class="btn btn-warning btn-sm btn-circle btn-update"
                    data-id="{{ $data->id }}"
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
  @include('admin.category.add-modal')
  <!-- Edit Modal -->
  @include('admin.category.edit-modal')
@endsection
@section('script')
<script>
  $("#dataTable").on("click", ".btn-update", function () {
    let id = $(this).data("id");
    let name = $(this).data("name");
    $("#edit-modal").modal("show");
    $(".id").val(id);
    $(".name").val(name);
  });
</script>
@endsection
