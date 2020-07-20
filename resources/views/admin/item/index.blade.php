@extends('templates.index')
@section('heading', 'Item')
@section('content')
@if ($action === 'view')
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="show-tab"
        data-toggle="tab"
        href="#show-item"
        role="tab"
        aria-controls="show"
        aria-selected="true"
        >Show Item</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="add-tab"
        data-toggle="tab"
        href="#add-item"
        role="tab"
        aria-controls="add"
        aria-selected="false"
        >Add Item</a
      >
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <!-- DataTales Example -->
    <div
      class="tab-pane fade show active"
      id="show-item"
      role="tabpanel"
      aria-labelledby="show-tab"
    >
      <div class="card shadow mb-4 mt-2">
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
                  <th>Title</th>
                  <th>Price</th>
                  <th>Location</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($item as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->title }}</td>
                    <td>$ {{ $data->price }}</td>
                    <td>{{ $data->city }}, {{ $data->country }}</td>
                    @if ($data->image)
                      <td>
                        <img
                          src="{{ asset($data->image) }}"
                          alt="{{ $data->title }}"
                          width="70"
                        />
                      </td>
                    @else
                      <td></td>
                    @endif
                    <td>
                      <form action="{{ route('item.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a
                          href="{{ route('item.edit', $data->id) }}"
                          class="btn btn-warning btn-sm btn-circle"
                          ><i class="fas fa-edit"></i
                        ></a>
                        <button
                          type="submit"
                          class="btn btn-danger btn-sm btn-circle"
                          onclick="return confirm('Yakin');"
                        >
                          <i class="fas fa-trash"></i>
                        </button>
                        <a
                          href="{{ route('item.show', $data->id) }}"
                          class="btn btn-success btn-sm btn-circle"
                          ><i class="fas fa-plus"></i
                        ></a>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End DataTales Example -->
    <!-- Add Item -->
    @include('admin.item.add-item')
    <!-- End Add Item -->
  </div>
@elseif ($action === 'edit')
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="edit-tab"
        data-toggle="tab"
        href="#edit-item"
        role="tab"
        aria-controls="show"
        aria-selected="true"
        >Edit Item</a
      >
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <!-- Edit Item -->
    @include('admin.item.edit-item')
    <!-- End Edit Item -->
  </div>
@endif
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
  function inputAngka(e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
    return true;
  }
  CKEDITOR.replace("description");
</script>
@endsection
