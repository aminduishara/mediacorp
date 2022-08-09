<?php include 'application/views/Layout/htmlHeader.php'; ?>

<div class="container pt-5 pb-5">
  <h3 class="text-center">General Information</h3>
  <input class="float-end btn btn-sm btn-dark" id="refNo" value="0000" disabled>
  <input class="float-end btn btn-sm btn-dark" id="aplicentID" value="0" hidden>
</div>
<div class="container mb-5">

  <style>
    .left-pane {
      background-color: seagreen;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .tab-content {
      height: 80vh;
      max-height: 80vh;
      overflow-y: auto;
    }

    .nav {
      flex-direction: column;
      align-items: center;
    }

    .nav-tabs {
      border-bottom: none !important;
    }

    .nav-tabs .nav-link.active,
    .nav-tabs .nav-item.show .nav-link {
      color: inherit !important;
      background-color: inherit !important;
      border: none !important;
    }

    .nav-tabs .nav-link:hover,
    .nav-tabs .nav-link:focus {
      border: none !important;
    }

    .nav-link {
      color: white !important;
      pointer-events: none;
    }
  </style>
  <div class="card">
    <div class="row">
      <div class="col-md-3 left-pane">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="fa-solid fa-circle"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" onclick="RefreshTable()"><i class="fa-solid fa-circle"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="img-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i class="fa-solid fa-circle"></i></a>
          </li>
        </ul>
      </div>
      <div class="col-md-9">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="general-tab"><?php include 'application/views/Forms/generalInfo.php'; ?></div>
          <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="description-tab"><?php include 'application/views/Forms/description.php'; ?></div>
          <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="img-tab"><?php include 'application/views/Forms/img.php'; ?></div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  function Next(id) {

    if (id == 1) {

      $('.nav-tabs li:eq(1) a').tab('show')

    } else if (id == 2) {

      $('.nav-tabs li:eq(2) a').tab('show')

    }

  }

  function Back(id) {

    if (id == 2) {

      $('.nav-tabs li:eq(0) a').tab('show')

    } else if (id == 3) {

      $('.nav-tabs li:eq(1) a').tab('show')

    }

  }
</script>
<?php include 'application/views/Layout/htmlFooter.php' ?>