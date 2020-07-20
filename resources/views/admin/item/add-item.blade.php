<div
  class="tab-pane fade"
  id="add-item"
  role="tabpanel"
  aria-labelledby="add-tab"
>
  <div class="card shadow mb-4 mt-2">
    <div class="card-body">
      <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input
            type="text"
            class="form-control"
            id="title"
            name="title"
            placeholder="Title"
            required
          />
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input
            type="text"
            class="form-control"
            id="price"
            name="price"
            placeholder="Price"
            onkeypress="return inputAngka(event)"
            required
          />
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input
            type="text"
            class="form-control"
            id="city"
            name="city"
            placeholder="City"
            required
          />
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          <select class="form-control" name="category_id" id="category_id">
            <option value="" selected disabled>--- Category ---</option>
            @foreach ($category as $data)
              <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
          </select>
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
        <div class="form-group">
          <label for="description">Description</label>
          <textarea
            class="form-control"
            name="description"
            id="description"
          ></textarea>
        </div>
        <input type="hidden" name="id" value="" />
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>