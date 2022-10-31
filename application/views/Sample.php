<?php include 'application/views/Layout/htmlHeader.php'; ?>

      <div class="row">
            <div class="col-md-4">
              <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100%; position: fixed;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                      <span class="fs-4">MediaCorp</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-auto">
                      <li class="nav-item">
                        <a href="index.php/Welcome/LoadForm" class="nav-link active" aria-current="page">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                          General Information
                        </a>
                      </li>
                      <li>
                        <a href="#" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                          Description
                        </a>
                      </li>
                      <li>
                        <a href="#" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                          Upload Images
                        </a>
                      </li>
                    </ul>
        </div>

      </div>


      <div class="col-md-8">

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

        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="general-tab"><?php include 'application/views/Forms/generalInfo.php'; ?></div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="description-tab"><?php include 'application/views/Forms/description.php'; ?></div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="img-tab"><?php include 'application/views/Forms/img.php'; ?></div>

      </div>

</div>



<?php include 'application/views/Layout/htmlFooter.php' ?>

