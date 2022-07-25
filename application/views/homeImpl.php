<?php include 'application/views/Layout/htmlHeader.php'; ?>

    <div class="container pt-5 pb-5">
        <h3 class="text-center">General Information</h3>
    </div>
<div class="container mb-5">


     <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">General Information</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Add Description</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="img-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Upload Images</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="general-tab" tabindex="0"><?php include 'application/views/Forms/generalInfo.php'; ?></div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0"><?php include 'application/views/Forms/description.php'; ?></div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="img-tab" tabindex="0"><?php include 'application/views/Forms/img.php'; ?></div>
</div>
</div>

<?php include 'application/views/Layout/htmlFooter.php' ?>