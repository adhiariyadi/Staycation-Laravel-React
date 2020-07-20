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
        <h5 class="modal-title" id="exampleModalLabel">Update Bank</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="name_bank">Name Bank</label>
            <input
              type="text"
              class="form-control name_bank"
              id="name_bank"
              name="name_bank"
              placeholder="Name Bank"
              required
            />
          </div>
          <div class="form-group">
            <label for="nomor_rekening">Nomor Rekening</label>
            <input
              type="text"
              class="form-control nomor_rekening"
              id="nomor_rekening"
              name="nomor_rekening"
              placeholder="Nomor Rekening"
              required
            />
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              class="form-control name"
              id="name"
              name="name"
              placeholder="Name"
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
            />
            <span>Pilih image untuk update image</span>
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