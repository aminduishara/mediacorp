<div class="p-5">

        <?php echo form_open_multipart('Form/GetImages'); ?>

        <div class="col-md-12 row">
                <div class="col-md-4">
                        <?php $no = 3; for ($i = 0; $i < $no; $i++) { ?>
                        <div class="col-md-12">
                                <div class="card card-body row">
                                        <div class="col-md-8">
                                                <label>Upload Image <?php echo $i + 1 ?></label>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <input class="form-control" type="file" id="ImgFile<?php echo $i + 1 ?>" onchange="preview(<?php echo $i + 1 ?>)" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                                <button class="btn btn-danger" onclick="clearImage(<?php echo $i + 1 ?>)">Remove</button>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="col-md-4">
                                                        <img id="Image<?php echo $i + 1 ?>" style="width: 50px; height: 50px; object-fit: contain;" />
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <?php } ?>
                </div>

                <div class="col-md-8">
                        <div class="card card-body row">
                                <div class="col-md-12 row">
                                        <div class="col-6">
                                                <select class="form-select" id="ddlType" name="ddlType">
                                                <option value="0">Select Type</option>
                                                </select>
                                        </div>
                                        <div class="col-md-3">
                                                <input class="form-control" type="file" id="fileUpload" name="fileUpload" accept="application/pdf,application/vnd.ms-excel">
                                        </div>
                                        <button class="btn btn-warning col-md-3" id="btnUpload" name="btnUpload">Upload</button>
                                </div>

                                <div class="col-md-12">
                                        <div class="table-responsive" style="max-height: 30vh; overflow-y: auto;">
                                                <table class="table table-striped table-bordered" id="tblUploads">
                                                        <thead>
                                                                <tr>
                                                                        <th hidden>ID</th>
                                                                        <th>Upload Type</th>
                                                                        <th>File Name</th>
                                                                        <th width="12%">Action</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                </table>
                                        </div>
                                </div>
                        </div>
                </div>
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

        $(document).ready(function() {

                var aplicentID = 12000; //document.getElementById("aplicentID").value;
                if (aplicentID != "") {
                        $.ajax({
                                type: "post",
                                url: "<?php echo base_url('/index.php/Form/getUploadData'); ?>",
                                data: {
                                        aplicentID: aplicentID,
                                },
                                dataType: 'json',
                                async: true,
                                success: function (response) {
                                        $('#ddlType').empty();
                                        $('#ddlType').append('<option value="0">Select Type</option>');
                                        response['uploadTypes'].forEach((type)=>{
                                                $('#ddlType').append(`<option value="${type['mas_uploadtype_id']}">${type['mas_uploadtype_des']}</option>`)
                                        });

                                        $('#tblUploads tbody').empty();
                                        response['uploadFiles'].forEach((file) => {
                                                $('#tblUploads tbody').append(`<tr id="tr${file['aplicent_upload_id']}">
                                                        <td hidden>${file['aplicent_upload_id']}</td>
                                                        <td>${file['mas_uploadtype_des']}</td>
                                                        <td>${file['aplicent_upload_name']}</td>
                                                        <td><button type="button" class="btn btn-danger btn-sm" id="btnRemove">X</button></td>
                                                </tr>`);
                                        });
                                },
                                error: function () {
                                        alert("Invalid!");
                                }
                        });
                }
        });

        $('#btnUpload').click(function() {
                var aplicentID = 12000; //document.getElementById("aplicentID").value;
                var typeID = $('#ddlType').val();

                alert( $('#fileUpload')[0].files[0] == null );

                if (aplicentID != "" && typeID != 0) {
                        // $(this).hide();
                        // setTimeout(function () {
                        //         let url = '<?php echo base_url('/index.php/Form/saveAplicentUpload'); ?>';

                        //         let files = new FormData()
                        //         files.append('aplicentID', aplicentID);
                        //         files.append('typeID', typeID);
                        //         files.append('fileToUpload', $('#fileUpload')[0].files[0]);
                        //         $.ajax({
                        //                 type: 'post',
                        //                 url: url,
                        //                 processData: false,
                        //                 contentType: false,
                        //                 data: files,
                        //                 dataType: 'json',
                        //                 async: true,
                        //                 success: function (response) {
                        //                         $('#btnUpload').show();
                        //                         $('#tblUploads tbody').empty();
                        //                         response['uploadFiles'].forEach((file) => {
                        //                                 $('#tblUploads tbody').append(`<tr id="tr${file['aplicent_upload_id']}">
                        //                                         <td hidden>${file['aplicent_upload_id']}</td>
                        //                                         <td>${file['mas_uploadtype_des']}</td>
                        //                                         <td>${file['aplicent_upload_name']}</td>
                        //                                         <td><button type="button" class="btn btn-danger btn-sm" id="btnRemove">X</button></td>
                        //                                 </tr>`);
                        //                         });
                        //                 },
                        //                 error: function (err) {
                        //                         swal('Error', 'Error Occured : '.err, 'Error');
                        //                 }
                        //         });
                        // },1000);
                } else {
                        alert("Select Type!");
                }
        });
        
        $('#tblUploads').on('click', '#btnRemove', function () {
                let id = $(this).closest('tr').find('td:eq(0)').text().trim();

                $.ajax({
                        type: "post",
                        url: "<?php echo base_url('/index.php/Form/removeAplicentUpload'); ?>",
                        data: {
                                id: id
                        },
                        dataType: 'json',
                        async: true,
                        success: function (response) {
                                $('#tr' + id).remove();
                        },
                        error: function () {
                                alert("Invalid!");
                        }
                });
        })


        $('#btnBack').click(function() {
                console.log(1);
                $('.nav-tabs li:eq(1) a').tab('show');
        });

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
</script>