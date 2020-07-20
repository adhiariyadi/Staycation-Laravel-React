<div
  class="tab-pane fade show active"
  id="edit-item"
  role="tabpanel"
  aria-labelledby="edit-tab"
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
            value="{{ $item->title }}"
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
            value="{{ $item->price }}"
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
            value="{{ $item->city }}"
            placeholder="City"
            required
          />
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          <select class="form-control" name="category_id" id="category_id">
            <option value="" disabled>--- Category ---</option>
            @foreach ($category as $data)
              <option value="{{ $data->id }}"
                @if ($data->id == $item->category_id)
                selected
                @endif
              >{{ $data->name }}</option>
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
          />
          <span>Pilih image untuk update image</span>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description">
            {{ $item->description }}
          </textarea>
        </div>
        <input type="hidden" name="id" value="{{ $item->id }}" />
        <a href="{{ route('item.index') }}" class="btn btn-warning mr-2">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
