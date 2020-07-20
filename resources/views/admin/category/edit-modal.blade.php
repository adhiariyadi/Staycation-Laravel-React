<div
  class="modal fade"
  id="edit-modal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              class="form-control name"
              id="name"
              name="name"
              placeholder="Name Category"
              required
            />
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" class="id" name="id" />
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>