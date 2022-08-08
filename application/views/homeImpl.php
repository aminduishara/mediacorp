<?php include 'application/views/Layout/htmlHeader.php'; ?>

<div class="container pt-5 pb-5">
  <h3 class="text-center">General Information</h3>
  <input class="float-end btn btn-sm btn-dark" id="refNo" value="0000" disabled>
  <input class="float-end btn btn-sm btn-dark" id="aplicentID" value="0" hidden>
</div>
<div class="container mb-5">


  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">General Information</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" onclick="RefreshTable()">Add Description</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="img-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Upload Images</a>
    </li>
  </ul>
  <style>
    .left-pane {
      background-color: seagreen;
    }
  </style>
  <div class="card">
    <div class="row">
      <div class="col-md-3 left-pane"></div>
      <div class="col-md-9">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, totam eos repellat maiores voluptate laudantium velit sapiente voluptates quidem. Neque, expedita exercitationem illum quos omnis eaque a illo commodi dolorum est, quam iure maiores! Explicabo quod eligendi ipsum qui assumenda quo eveniet quaerat, nobis blanditiis obcaecati perferendis libero accusantium doloribus sed? Non, hic voluptates sapiente voluptate quos esse reiciendis, minus voluptatum deleniti, cupiditate est quis veritatis itaque ipsum neque provident exercitationem numquam consectetur. Molestiae ab adipisci tempore maxime expedita nostrum! Itaque quos similique alias esse qui provident suscipit fugiat id, sequi unde adipisci animi, dolorum natus dignissimos sapiente ratione ut.
      </div>
    </div>
  </div>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="general-tab"><?php include 'application/views/Forms/generalInfo.php'; ?></div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="description-tab"><?php include 'application/views/Forms/description.php'; ?></div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="img-tab"><?php include 'application/views/Forms/img.php'; ?></div>
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