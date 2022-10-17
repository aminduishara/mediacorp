<?php include 'application/views/Layout/htmlHeader.php'; ?>
<style>
  .svg .svgCl {
    background-color: #396cf0 !important;
    background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0)) !important;
  }
</style>

<div class="container pt-5 pb-1 mb-5">
  <div class="col-12 text-end">
    <h3 class="text-center"><?php if (isset($para->mas_compara_header1)) echo $para->mas_compara_header1; ?></h3>
    <div class="col-2 offset-10">
      <input class="mt-1 form-control" id="refNo" value="0000" disabled>
      <input id="aplicentID" value="-1" hidden>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="row" style="position: relative;">
        <div class="svg" style="position: absolute; top: -4px; left: -109px; height: 130px; width: 130px;">
          <!-- <img src="<?php echo base_url(); ?>assets/Vector 1.svg" alt="side panel" > -->
          <!-- <svg width="110" height="130" viewBox="0 0 51 58" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M50.3098 49.5714C50.6048 56.1429 45 57 45 57V43C45 43 50.0148 43 50.3098 49.5714Z" stroke="white" stroke-width="0.5" fill="white" />
            <path d="M14.5 36.5C14.2788 29.9286 21.9909 29 21.9909 29H45.0001V43H21.9909C21.9909 43 14.7212 43.0714 14.5 36.5Z" stroke="black" stroke-width="0" class="svgCl" />
            <path d="M49.9888 21.5714C50.2837 28.1429 44.6789 29 44.6789 29V15C44.6789 15 49.6938 15 49.9888 21.5714Z" stroke="black" stroke-width="0" fill="white" />
            <path d="M1.01375 8.42857C0.653205 1.85714 7.50352 1 7.50352 1H45V15H7.50352C7.50352 15 1.37429 15 1.01375 8.42857Z" stroke="black" stroke-width="0" class="svgCl" />

          </svg> -->
          <svg width="50" height="57" viewBox="0 0 50 57" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M49.3098 48.5714C49.6048 55.1429 44 56 44 56V42C44 42 49.0148 42 49.3098 48.5714Z" fill="white" stroke="black" stroke-width="0.5" />
            <path d="M13.5 35.5C13.2788 28.9286 20.9909 28 20.9909 28H44.0001V42H20.9909C20.9909 42 13.7212 42.0714 13.5 35.5Z" fill="#396CF0" />
            <path d="M13.5 35.5C13.2788 28.9286 20.9909 28 20.9909 28H44.0001V42H20.9909C20.9909 42 13.7212 42.0714 13.5 35.5Z" fill="url(#paint0_linear_2_13)" fill-opacity="0.2" />
            <path d="M48.9888 20.5714C49.2837 27.1429 43.6789 28 43.6789 28V14C43.6789 14 48.6938 14 48.9888 20.5714Z" fill="white" />
            <path d="M0.0137485 7.42857C-0.346795 0.857143 6.50352 0 6.50352 0H44V14H6.50352C6.50352 14 0.374292 14 0.0137485 7.42857Z" fill="#396CF0" />
            <path d="M0.0137485 7.42857C-0.346795 0.857143 6.50352 0 6.50352 0H44V14H6.50352C6.50352 14 0.374292 14 0.0137485 7.42857Z" fill="url(#paint1_linear_2_13)" fill-opacity="0.2" />
            <defs>
              <linearGradient id="paint0_linear_2_13" x1="28.7477" y1="28" x2="28.7477" y2="42" gradientUnits="userSpaceOnUse">
                <stop stop-color="white" />
                <stop offset="1" stop-color="white" stop-opacity="0" />
              </linearGradient>
              <linearGradient id="paint1_linear_2_13" x1="22" y1="0" x2="22" y2="14" gradientUnits="userSpaceOnUse">
                <stop stop-color="white" />
                <stop offset="1" stop-color="white" stop-opacity="0" />
              </linearGradient>
            </defs>
          </svg>
        </div>
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
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="general-tab"><?php include 'application/views/Forms/generalInfo.php'; ?></div>
            <div class="tab-pane fade" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab"><?php include 'application/views/Forms/description.php'; ?></div>
            <div class="tab-pane fade" id="img-tab-pane" role="tabpanel" aria-labelledby="img-tab"><?php include 'application/views/Forms/img.php'; ?></div>
          </div>
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