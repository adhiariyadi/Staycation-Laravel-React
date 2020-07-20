@extends('templates.index')
@section('heading', 'Show Item')
@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="show-tab"
      data-toggle="tab"
      href="#show-feature"
      role="tab"
      aria-controls="show"
      aria-selected="true"
      >Show Feature</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="show-tab"
      data-toggle="tab"
      href="#show-activity"
      role="tab"
      aria-controls="show"
      aria-selected="false"
      >Show Activity</a
    >
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <!-- Show Feature Item -->
  @include('admin.item.feature.index')
  <!-- End Show Feature Item -->
  <!-- Show Activity Item -->
  @include('admin.item.activity.index')
  <!-- End Show Activity Item -->
</div>
@endsection
@section('modal')
  <!-- Modal Feature -->
  @include('admin.item.feature.modal')
  <!-- Modal Activity -->
  @include('admin.item.activity.modal')
@endsection
@section('script')
<script>
  $(document).ready(function () {
    $("#dataTable2").dataTable();
  });
  function inputAngka(e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
    return true;
  }
  $("#dataTable").on("click", ".edit-feature", function () {
    let id = $(this).data("id");
    let name = $(this).data("name");
    let qty = $(this).data("qty");
    $("#modal-feature").modal("show");
    $(".id").val(id);
    $(".name").val(name);
    $(".qty").val(qty);
  });
  $("#dataTable2").on("click", ".edit-activity", function () {
    let id = $(this).data("id");
    let name = $(this).data("name");
    let type = $(this).data("type");
    $("#modal-activity").modal("show");
    $(".id").val(id);
    $(".name").val(name);
    $(".type").val(type);
  });
</script>
@endsection
