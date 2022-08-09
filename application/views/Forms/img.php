<div class="p-5">

        <?php echo form_open_multipart('Form/GetImages'); ?>

        <div class="row mb-4">
                <?php

                $no = 3;
                for ($i = 0; $i < $no; $i++) { ?>
                        <div class="mt-4 col-md-4">
                                <div class="card card-body">
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
                                                        <img id="Image<?php echo $i + 1 ?>" style="width: 200px; height: 200px; object-fit: contain;" />
                                                </div>

                                        </div>

                                </div>
                        </div>


                <?php
                }
                ?>
        </div>
        <?php echo form_close(); ?>

        <div>
                <div class="d-flex justify-content-between">
                        <div class="col">
                                <div class="form-group col-sm-12">
                                        <button type="button" class="text-white btn btn-md btn-dark" id="btnBack">Back</button>
                                </div>
                        </div>
                        <div class="col">
                                <div class="form-group col-sm-12 text-end">
                                        <input type="button" class="text-white btn btn-md btn-success" value="Submit Application" id="btnSubmit">
                                </div>
                        </div>
                </div>
        </div>
</div>



<script type="text/javascript">
        $('#btnBack').click(function() {
                console.log(1);
                $('.nav-tabs li:eq(1) a').tab('show');
        })

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


        $("#btnSubmit").click(function() {
                var image1 = document.getElementById("ImgFile1").files.length;
                var image2 = document.getElementById("ImgFile2").files.length;
                var image3 = document.getElementById("ImgFile3").files.length;
                var aplicentID = document.getElementById("aplicentID").value;

                let url = '<?php echo base_url('/index.php/Form/SaveImages'); ?>';

                if (image1 == 0) {
                        alert("Please Choose the Image 1");
                        return;
                } else if (image2 == 0) {
                        alert("Please Choose the Image 2");
                        return;
                } else if (image3 == 0) {
                        alert("Please Choose the Image 3");
                        return;
                } else {

                        var Filename1 = aplicentID + "-" + $('#ImgFile1').val().split('\\').pop();

                        var Filename2 = aplicentID + "-" + $('#ImgFile2').val().split('\\').pop();

                        var Filename3 = aplicentID + "-" + $('#ImgFile3').val().split('\\').pop();

                        if (image1) {
                                let files = new FormData()

                                files.append('fileToUpload', $('#ImgFile1')[0].files[0]);
                                files.append('name', Filename1);
                                $.ajax({
                                        type: 'post',
                                        url: url,
                                        processData: false,
                                        contentType: false,
                                        data: files,
                                        success: function(res) {
                                                console.log('Image Uploaded');

                                        },
                                        error: function() {
                                                console.log('Upload Fail');
                                        }
                                });
                        }
                        if (image2) {
                                let files = new FormData()

                                files.append('fileToUpload', $('#ImgFile1')[0].files[0]);
                                files.append('name', Filename2);
                                $.ajax({
                                        type: 'post',
                                        url: url,
                                        processData: false,
                                        contentType: false,
                                        data: files,
                                        success: function(res) {
                                                console.log('Image Uploaded');

                                        },
                                        error: function() {
                                                console.log('Upload Fail');
                                        }
                                });
                        }
                        if (image3) {
                                let files = new FormData()

                                files.append('fileToUpload', $('#ImgFile3')[0].files[0]);
                                files.append('name', Filename3);

                                $.ajax({
                                        type: 'post',
                                        url: url,
                                        processData: false,
                                        contentType: false,
                                        data: files,
                                        success: function(res) {
                                                console.log('Image Uploaded');

                                        },
                                        error: function() {
                                                console.log('Upload Fail');
                                        }
                                });
                        }


                        var filename1 = String(Filename1);
                        var filename2 = String(Filename2);
                        var filename3 = String(Filename3);

                        // $.ajax({

                        //                 type: 'post',
                        //                 url:"<?php echo base_url('/index.php/Form/SaveImageToDB'); ?>",
                        //                 dataType:'html',
                        //                 data: {
                        //                         img1:filename1,
                        //                         img2:filename2,
                        //                         img3:filename3,
                        //                         aplicentID:aplicentID
                        //                 },
                        //                 success: function(res) {

                        //                         console.log(res);

                        //                 },
                        //                 error: function(error) {
                        //                         console.log(error);
                        //                 }
                        // });
                        jQuery.ajax({
                                type: 'POST',
                                url: "<?php echo base_url('/index.php/Form/SaveImagesToDB'); ?>",
                                dataType: 'html',
                                data: {
                                        img1: filename1,
                                        img2: filename2,
                                        img3: filename3,
                                        aplicentID: aplicentID
                                },
                                success: function(res) {

                                        console.log(JSON.parse(res));

                                },
                                error: function() {
                                        console.log("Fail To Update the DB");
                                }
                        });


                }



                $(this).hide();
                if (image1 || image2 || image3) {
                        $(this).val('Uploading.....');
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