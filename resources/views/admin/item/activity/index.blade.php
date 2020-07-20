<div class="tab-pane fade" id="show-activity">
    <div class="row mb-4 mt-2">
      <div class="col-5">
        <div class="card shadow">
          <div class="card-body">
            <form action="{{ route('item.activity') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="type">Type</label>
                <input
                  type="text"
                  class="form-control"
                  id="type"
                  name="type"
                  placeholder="Type"
                  required
                />
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input
                  type="file"
                  class="form-control-file"
                  id="image"
                  name="image"
                  required
                />
              </div>
              <hr />
              <div class="form-group">
                <input type="hidden" name="item_id" value="{{ $item->id }}" />
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-7">
        <div class="card shadow">
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table table-bordered"
                id="dataTable2"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($item->activity($item->id) as $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->type }}</td>
                      @if ($data->image)
                        <td>
                          <img
                            src="{{ asset($data->image) }}"
                            alt="{{ $data->name }}"
                            width="50"
                          />
                        </td>
                      @else
                        <td></td>
                      @endif
                      <td>
                        <form action="{{ route('activity.destroy', $data->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <a
                            href="javascript:void()"
                            class="btn btn-warning btn-sm btn-circle edit-activity"
                            data-id="{{ $data->id }}"
                            data-name="{{ $data->name }}"
                            data-type="{{ $data->type }}"
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
      </div>
    </div>
  </div>