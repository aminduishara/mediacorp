<?php include 'application/views/Layout/htmlHeader.php'; ?>

<div class="container pt-5 pb-5">
  <h3 class="text-center"><?php if (isset($para->mas_compara_header1)) echo $para->mas_compara_header1; ?></h3>
  <input class="float-end btn btn-sm btn-dark" id="refNo" value="0000" disabled style="margin-top: 1rem;">
  <input class="float-end btn btn-sm btn-dark" id="aplicentID" value="-1" hidden>
</div>
<div class="container mb-5">
  <div class="card">
    <div class="row">
      <div class="col-md-1 left-pane d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="fa-solid fa-circle"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="false" onclick="RefreshTable()"><i class="fa-solid fa-circle"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="img-tab" data-bs-toggle="tab" data-bs-target="#img-tab-pane" type="button" role="tab" aria-controls="img-tab-pane" aria-selected="false"><i class="fa-solid fa-circle"></i></a>
          </li>
        </ul>
      </div>
      <div class="col-md-11">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="general-tab"><?php include 'application/views/Forms/generalInfo.php'; ?></div>
          <div class="tab-pane fade" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab"><?php include 'application/views/Forms/description.php'; ?></div>
          <div class="tab-pane fade show active" id="img-tab-pane" role="tabpanel" aria-labelledby="img-tab"><?php include 'application/views/Forms/img.php'; ?></div>
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