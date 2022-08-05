<div class="m-5">

        <?php echo form_open_multipart('Form/GetImages'); ?>

        <?php

        $no = 3;
        for ($i = 0; $i < $no; $i++) { ?>
                <div class="card  mt-4">
                        <img class="card-img-top">
                        <div class="card-body">
                                <h5 class="card-title">Upload Image <?php echo $i + 1 ?></h5>

                                <div class="row">

                                        <div class="col-md-6">
                                                <input class="form-control mb-5" type="file" id="ImgFile<?php echo $i + 1 ?>" onchange="preview(<?php echo $i + 1 ?>)" required>
                                        </div>

                                        <div class="col-md-2">
                                                <button class="btn btn-danger" onclick="clearImage(<?php echo $i + 1 ?>)">Remove</button>
                                        </div>

                                </div>
                                <div class="row mt-5">

                                        <div class="col-md-4 mb-3">
                                                <img id="Image<?php echo $i + 1 ?>" class="img-fluid" />
                                        </div>

                                </div>

                        </div>
                </div>


        <?php
        }
        ?>

        <?php echo form_close(); ?>

        <div class="col float-start">
                <div class="row mt-4 mb-4">
                        <div class="form-group col-sm-12 text-center">
                                <input type="button" class="text-white btn btn-md btn-warning float-end px-5" value="Back" onclick="Back(3)" id="Back">
                        </div>
                </div>
        </div>

        <div class="col float-end">
                <div class="row mt-4 mb-4">
                        <div class="form-group col-sm-12 text-center">
                                <input type="button" class="text-white btn btn-md btn-success float-end px-5" value="Submit" id="btnSubmit">
                        </div>
                </div>
        </div>
</div>



<script type="text/javascript">
        function preview(id) {

                if (id == 1) {
                        Image1.src = URL.createObjectURL(event.target.files[0]);
                } else if (id == 2) {
                        Image2.src = URL.createObjectURL(event.target.files[0]);
                } else if (id == 3) {
                        Image3.src = URL.createObjectURL(event.target.files[0]);
                } else {
                        return;
                }

        }

        function clearImage(id) {

                if (id == 1) {
                        document.getElementById('ImgFile1').value = null;
                        Image1.src = "";
                } else if (id == 2) {
                        document.getElementById('ImgFile2').value = null;
                        Image2.src = "";
                } else if (id == 3) {
                        document.getElementById('ImgFile3').value = null;
                        Image3.src = "";
                } else {
                        return;
                }

        }

        //     function preview2() {
        //             Image2.src = URL.createObjectURL(event.target.files[0]);
        //     }
        //     function clearImage2() {
        //             document.getElementById('ImgFile2').value = null;
        //             Image2.src = "";
        //     }

        //     function preview3() {
        //             Image3.src = URL.createObjectURL(event.target.files[0]);
        //     }
        //     function clearImage3() {
        //             document.getElementById('ImgFile3').value = null;
        //             Image3.src = "";
        //     }
        // Ajax post
        // $(document).ready(function() 
        // {
        $("#btnSubmit").click(function() {
                var image1 = document.getElementById("ImgFile1").files.length;
                var image2 = document.getElementById("ImgFile2").files.length;
                var image3 = document.getElementById("ImgFile3").files.length;
                if (image1) {
                        let files = new FormData(),
                                url = '<?php echo base_url('/index.php/Form/SaveImages'); ?>';

                        files.append('fileToUpload', $('#ImgFile1')[0].files[0]);
                        files.append('name', $('#ImgFile1').val().split('\\').pop());
                        $.ajax({
                                type: 'post',
                                url: url,
                                processData: false,
                                contentType: false,
                                data: files,
                                success: function(res) {
                                        alert('Image Uploaded');

                                },
                                error: function() {
                                        console.log('Upload Fail');
                                }
                        });
                }
                if (image2) {
                        let files = new FormData(),
                                url = '<?php echo base_url('/index.php/Form/SaveImages'); ?>';

                        files.append('fileToUpload', $('#ImgFile1')[0].files[0]);
                        files.append('name', $('#ImgFile2').val().split('\\').pop());
                        $.ajax({
                                type: 'post',
                                url: url,
                                processData: false,
                                contentType: false,
                                data: files,
                                success: function(res) {
                                        alert('Image Uploaded');

                                },
                                error: function() {
                                        console.log('Upload Fail');
                                }
                        });
                }
                if (image3) {
                        let files = new FormData(),
                                url = '<?php echo base_url('/index.php/Form/SaveImages'); ?>';

                        files.append('fileToUpload', $('#ImgFile1')[0].files[0]);
                        files.append('name', $('#ImgFile3').val().split('\\').pop());
                        $.ajax({
                                type: 'post',
                                url: url,
                                processData: false,
                                contentType: false,
                                data: files,
                                success: function(res) {
                                        alert('Image Uploaded');

                                },
                                error: function() {
                                        console.log('Upload Fail');
                                }
                        });
                }

                $(this).hide('slow');
                if (image1 || image2 || image3) {
                        $(this).html('Uploading.....');
                        $(this).attr('disabled', true);
                        $(this).show('slow');
                        setTimeout(() => {
                                window.location.reload();
                        }, 5000);
                } else {
                        window.location.reload();
                }
        });
        // });
</script>