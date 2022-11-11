<style>
        .loading {
                width: 93%;
                height: 93%;
                background-color: teal;
                position: absolute;
                z-index: 100;
                display: flex;
                align-items: center;
                justify-content: center;
        }

        .loading .container1 {
                height: 15px;
                width: 105px;
                display: flex;
                position: relative;
        }

        .loading .container1 .circle {
                width: 15px;
                height: 15px;
                border-radius: 50%;
                background-color: #fff;
                animation: move 500ms linear 0ms infinite;
                margin-right: 30px;
        }

        .loading .container1 .circle:first-child {
                position: absolute;
                top: 0;
                left: 0;
                animation: grow 500ms linear 0ms infinite;
        }

        .loading .container1 .circle:last-child {
                position: absolute;
                top: 0;
                right: 0;
                margin-right: 0;
                animation: grow 500ms linear 0s infinite reverse;
        }

        @keyframes grow {
                from {
                        transform: scale(0, 0);
                        opacity: 0;
                }

                to {
                        transform: scale(1, 1);
                        opacity: 1;
                }
        }

        @keyframes move {
                from {
                        transform: translateX(0px);
                }

                to {
                        transform: translateX(45px);
                }
        }
</style>
<div class="p-5" style="position: relative;">

        <?php echo form_open_multipart('Form/GetImages'); ?>


        <!-- Modal -->
        <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="modalViewLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                                <div class="modal-header" style="background-color: #1ABC9C; padding-bottom: 10px;">
                                        <h5 class="modal-title" style="color: white;" id="modalViewLabel">Declaration</h5>
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button> -->
                                </div>
                                <div class="modal-body pb-0">
                                        <div class="col-md-12">
                                                <h5>Declaration</h5>
                                                <p id="decDeclaration">

                                                </p>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <input type="checkbox" id="cbAgree" name="cbAgree" style="width: 20px; height: 20px;">
                                        <label for="cbAgree"> I agree to the above declaration</label>
                                        <button type="button" class="btn btn-primary" id="btnAgree">Submit Declaration</button>
                                        <button type="button" class="btn btn-secondary" onclick="$('#modalView').modal('hide');">Close</button>
                                </div>
                        </div>
                </div>
        </div>
        <div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalViewLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                                <div class="modal-header" style="background-color: #5DADE2; padding-bottom: 10px;">
                                        <h5 class="modal-title" style="color: white;" id="modalViewLabel">How to copy the URL</h5>
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button> -->
                                </div>
                                <div class="modal-body pb-0">
                                        <div class="col-md-12">
                                                <img src="<?php echo base_url(); ?>assets/imglink1.jpg" alt="link image" style="object-fit: contain; width: 60rem; 60rem;">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="$('#modalImage').modal('hide');">Close</button>
                                </div>
                        </div>
                </div>
        </div>



        <div class="loading">
                <div class="container1">
                        <span class="circle"></span>
                        <span class="circle"></span>
                        <span class="circle"></span>
                        <span class="circle"></span>
                </div>
        </div>
        <div class="col-md-12" style="min-height: 60vh;">
                <div class="row">
                        <div class="col-md-4">
                                <div>
                                        <h3>Images Upload</h3>
                                        <span id="lblImageText">(Performer&#39;s Photo & End Frame in hi-res jpeg)</span>
                                </div>
                                <?php $no = 2;
                                for ($i = 0; $i < $no; $i++) { ?>
                                        <div class="col-md-12" id="divImg<?php echo $i; ?>">
                                                <div class="card card-body">
                                                        <div class="row">
                                                                <div class="col-md-8">
                                                                        <label><?php echo $i == 0 ? 'Programme End Frame' : 'Performer&#39;s Photo' ?></label>
                                                                        <div class="row">
                                                                                <div class="col-md-8">
                                                                                        <input class="form-control" type="file" id="ImgFile<?php echo $i + 1 ?>" onchange="preview(<?php echo $i + 1 ?>)">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                        <button type="button" class="btn btn-danger" onclick="clearImage(<?php echo $i + 1 ?>)"><i class="fa fa-remove"></i></button>
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
                                        </div>
                                <?php } ?>
                        </div>

                        <div class="col-md-8" style="display: none;">
                                <div>
                                        <h3>Attach the Reference File <span style="font-size: 1rem; font-weight: normal;">(PDF only)</span></h3>
                                </div>
                                <div class="card card-body">
                                        <div class="col-md-12">
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <select class="form-select" id="ddlType" name="ddlType">
                                                                        <option value="0">Select Type</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                                <input class="form-control" type="file" id="fileUpload" name="fileUpload" accept="application/pdf,application/vnd.ms-excel">
                                                        </div>
                                                        <div class="col-md-3 text-end">
                                                                <button type="button" class="btn btn-warning" id="btnUpload" name="btnUpload">Upload</button>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
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
                        <div class="col-md-8 mt-1">
                                <div class="card card-body">
                                        <h3>YouTube Links <span style="font-size: 1rem; font-weight: normal;">Unlisted YouTube Videos</span></h3>
                                        <div class="col-md-12">
                                                <div class="row">
                                                        <div class="col-md-4" style="display: none">
                                                                <select class="form-select" id="cmbVideoType" name="cmbVideoType">
                                                                        <!-- <option value="">Select Type</option> -->
                                                                        <option value="1">YouTube</option>
                                                                        <!-- <option value="2">Audio</option> -->
                                                                </select>
                                                        </div>
                                                        <div class="col-md-9">
                                                                <input type="hidden" id="txtVideoID">
                                                                <input class="form-control" type="text" id="videoText" name="videoText" placeholder="https://youtu.be/xxxxxxxxxxx">
                                                        </div>
                                                        <div class="col-md-3 text-end">
                                                                <button type="button" class="btn btn-info" id="btnInfo" name="btnInfo">?</button>
                                                                <button type="button" class="btn btn-warning" id="btnAddVideoLink" name="btnAddVideoLink">Add</button>
                                                                <button type="button" class="btn btn-warning" id="btnUpdateVideoLink" name="btnUpdateVideoLink" style="display: none">Update</button>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                                <div class="table-responsive" style="max-height: 30vh; overflow-y: auto;">
                                                        <table class="table table-striped table-bordered" id="tblVideoLinks">
                                                                <thead>
                                                                        <tr>
                                                                                <th hidden>ID</th>
                                                                                <th hidden>Type</th>
                                                                                <th>Link</th>
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
        </div>

        <!-- <div class="col-md-12 previewPDF" style="padding-top: 0; padding-bottom: 0;">
                <embed class="w-100" height="540" src="<?php echo base_url() . 'uploads/A1_coolfreecv_resume_en_06_n.pdf'; ?>" type="application/pdf">
        </div> -->

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
                var aplicentID = document.getElementById("aplicentID").value;
                console.log("L A_ID : " + aplicentID);
                if (aplicentID != '-1') {
                        $.ajax({
                                type: "post",
                                url: "<?php echo base_url('/index.php/Form/getUploadData'); ?>",
                                data: {
                                        aplicentID: aplicentID,
                                },
                                dataType: 'json',
                                async: true,
                                success: function(response) {
                                        $('#ddlType').empty();
                                        $('#ddlType').append('<option value="0">Select Type</option>');
                                        response['uploadTypes'].forEach((type) => {
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
                                error: function() {
                                        alert("Invalid!");
                                }
                        });
                }
        });

        $('#btnUpload').click(function() {
                var aplicentID = document.getElementById("aplicentID").value;
                console.log("U A_ID : " + aplicentID);
                var typeID = $('#ddlType').val();

                if (aplicentID != '-1' && typeID != 0 && $('#fileUpload')[0].files[0] != null) {
                        $(this).attr('disabled', true);
                        $(this).text('Uploading......');
                        setTimeout(function() {
                                let url = '<?php echo base_url('/index.php/Form/saveAplicentUpload'); ?>';

                                let files = new FormData()
                                files.append('aplicentID', aplicentID);
                                files.append('typeID', typeID);
                                files.append('fileToUpload', $('#fileUpload')[0].files[0]);
                                $.ajax({
                                        type: 'post',
                                        url: url,
                                        processData: false,
                                        contentType: false,
                                        data: files,
                                        dataType: 'json',
                                        async: true,
                                        success: function(response) {
                                                $('#btnUpload').attr('disabled', false);
                                                $('#btnUpload').text('Upload');
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
                                        error: function(err) {
                                                swal('Error', 'Error Occured : '.err, 'Error');
                                        }
                                });
                        }, 1000);
                } else {
                        alert("Plese Select type & file!");
                }
        });

        $('#tblUploads').on('click', '#btnRemove', function() {
                let id = $(this).closest('tr').find('td:eq(0)').text().trim();

                $.ajax({
                        type: "post",
                        url: "<?php echo base_url('/index.php/Form/removeAplicentUpload'); ?>",
                        data: {
                                id: id
                        },
                        dataType: 'json',
                        async: true,
                        success: function(response) {
                                $('#tr' + id).remove();
                        },
                        error: function() {
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
                        // Image3.src = URL.createObjectURL(event.target.files[0]);
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
                        // document.getElementById('ImgFile3').value = null;
                        // Image3.src = "";
                } else {
                        return;
                }

        }

        function buttonSubmit() {
                $(this).hide();
                var image1 = document.getElementById("ImgFile1").files.length;
                var image2 = document.getElementById("ImgFile2").files.length;
                // var image3 = document.getElementById("ImgFile3").files.length;
                var aplicentID = document.getElementById("aplicentID").value;

                let url = '<?php echo base_url('/index.php/Form/SaveImages'); ?>';

                if (image1 != 0 && image2 != 0 && image3 != 0) {

                        var Filename1 = aplicentID + "-" + $('#ImgFile1').val().split('\\').pop();

                        var Filename2 = aplicentID + "-" + $('#ImgFile2').val().split('\\').pop();

                        // var Filename3 = aplicentID + "-" + $('#ImgFile3').val().split('\\').pop();

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
                        // if (image3) {
                        //         let files = new FormData()

                        //         files.append('fileToUpload', $('#ImgFile3')[0].files[0]);
                        //         files.append('name', Filename3);

                        //         $.ajax({
                        //                 type: 'post',
                        //                 url: url,
                        //                 processData: false,
                        //                 contentType: false,
                        //                 data: files,
                        //                 success: function(res) {
                        //                         console.log('Image Uploaded');

                        //                 },
                        //                 error: function() {
                        //                         console.log('Upload Fail');
                        //                 }
                        //         });
                        // }


                        var filename1 = String(Filename1);
                        var filename2 = String(Filename2);
                        // var filename3 = String(Filename3);

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
                                        img3: '',
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



                if (image1 || image2) {
                        $(this).val('Uploading.....');
                        $(this).attr('disabled', true);
                        $(this).show('slow');
                        setTimeout(() => {
                                swal('Successfully Completed! Your reference is ' + $('#refNo').val(), 'You may use above reference number if you wish to edit your submission', 'success').then(function() {
                                        window.location.reload();
                                })
                        }, 5000);
                } else {
                        swal('Successfully Completed! Your reference is ' + $('#refNo').val(), 'You may use above reference number if you wish to edit your submission', 'success').then(function() {
                                window.location.reload();
                        })
                }
        }

        $("#btnSubmit").click(function() {
                var image1 = document.getElementById("ImgFile1").files.length;
                var image2 = document.getElementById("ImgFile2").files.length;
                if ($('#tblVideoLinks tbody tr').length <= 0) {
                        swal('Warning', 'Please add the YouTube link', 'warning');
                        return;
                }
                if (image1 <= 0) {
                        swal('Warning', 'Please upload the Programme End Frame', 'warning');
                        return;
                }
                if ($('input[name="aplicent_type"]:checked').val() == 1 && image2 <= 0) {
                        swal('Warning', 'Please upload the Performer’s Photo', 'warning');
                        return;
                }
                $('#modalView').modal('show');
        });

        $("#btnAgree").click(function() {
                if ($("#cbAgree").is(':checked')) {
                        $('#modalView').modal('hide');
                        buttonSubmit();
                }
        });

        $('#btnAddVideoLink').click(function() {
                let type = $('#cmbVideoType').val();
                let text = $('#videoText').val();
                var aplicentID = $("#aplicentID").val();
                if (type != '' && text != '') {
                        $(this).attr('disabled', true);
                        $(this).text('Saving......');

                        $.ajax({
                                type: 'POST',
                                url: "<?php echo base_url('/index.php/Form/saveVideos'); ?>",
                                dataType: 'json',
                                data: {
                                        aplicentID: aplicentID,
                                        type: type,
                                        text: text
                                },
                                success: function(res) {
                                        $('#btnAddVideoLink').attr('disabled', false);
                                        $('#btnAddVideoLink').text('Add');
                                        $('#videoText').val('');
                                        $('#cmbVideoType').val('');
                                        $('#tblVideoLinks tbody').empty();
                                        res['data'].forEach((index) =>
                                                $('#tblVideoLinks tbody').append(`
                                                <tr>
                                                        <td hidden>${index['videolink_id']}</td>
                                                        <td hidden>${index['videolink_type']}</td>
                                                        <td hidden>${index['videolink_type'] == 1 ? 'Video':'Audio'}</td>
                                                        <td>${index['videolink_url']}</td>
                                                        <td><button type="button" class="btn btn-info btn-sm" id="btnVideoEdit"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-danger btn-sm" id="btnVideoRemove"><i class="fa fa-remove"></i></button></td>
                                                </tr>
                                        `)
                                        )

                                },
                                error: function(e) {
                                        console.error(e);
                                }
                        });
                } else {
                        swal('Warning', 'Please select a type and add a valid URL', 'warning');
                }
        })

        $('#tblVideoLinks').on('click', '#btnVideoEdit', function() {
                $('#txtVideoID').val($(this).closest('tr').find('td:eq(0)').text().trim());
                $('#videoText').val($(this).closest('tr').find('td:eq(3)').text().trim());
                $('#cmbVideoType').val($(this).closest('tr').find('td:eq(1)').text().trim());
                $('#btnUpdateVideoLink').show();
                $('#btnAddVideoLink').hide();
        })

        $('#btnUpdateVideoLink').click(function() {
                let type = $('#cmbVideoType').val();
                let text = $('#videoText').val();
                var id = $("#txtVideoID").val();
                var aplicentID = $("#aplicentID").val();
                if (type != '' && text != '' && id != '') {
                        $(this).hide();

                        $.ajax({
                                type: 'POST',
                                url: "<?php echo base_url('/index.php/Form/updateVideos'); ?>",
                                dataType: 'json',
                                data: {
                                        id: id,
                                        type: type,
                                        text: text,
                                        aplicentID: aplicentID
                                },
                                success: function(res) {
                                        $('#btnAddVideoLink').show();
                                        $('#videoText').val('');
                                        $('#cmbVideoType').val('');
                                        $('#txtVideoID').val('');
                                        $('#tblVideoLinks tbody').empty();
                                        res['data'].forEach((index) =>
                                                $('#tblVideoLinks tbody').append(`
                                                <tr>
                                                        <td hidden>${index['videolink_id']}</td>
                                                        <td hidden>${index['videolink_type']}</td>
                                                        <td>${index['videolink_type'] == 1 ? 'Video':'Audio'}</td>
                                                        <td>${index['videolink_url']}</td>
                                                        <td><button type="button" class="btn btn-info btn-sm" id="btnVideoEdit"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-danger btn-sm" id="btnVideoRemove"><i class="fa fa-remove"></i></button></td>
                                                </tr>
                                        `)
                                        )

                                },
                                error: function(e) {
                                        console.error(e);
                                }
                        });
                } else {
                        swal('Warning', 'Please select a type and add a valid URL', 'warning');
                }
        })

        $('#tblVideoLinks').on('click', '#btnVideoRemove', function() {
                let id = $(this).closest('tr').find('td:eq(0)').text().trim();
                var aplicentID = $("#aplicentID").val();
                $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url('/index.php/Form/removeVideos'); ?>",
                        dataType: 'json',
                        data: {
                                aplicentID: aplicentID,
                                id: id
                        },
                        success: function(res) {
                                $('#tblVideoLinks tbody').empty();
                                res['data'].forEach((index) =>
                                        $('#tblVideoLinks tbody').append(`
                                                <tr>
                                                        <td hidden>${index['videolink_id']}</td>
                                                        <td hidden>${index['videolink_type']}</td>
                                                        <td>${index['videolink_type'] == 1 ? 'Video':'Audio'}</td>
                                                        <td>${index['videolink_url']}</td>
                                                        <td><button type="button" class="btn btn-info btn-sm" id="btnVideoEdit"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-danger btn-sm" id="btnVideoRemove"><i class="fa fa-remove"></i></button></td>
                                                </tr>
                                        `)
                                )

                        },
                        error: function(e) {
                                console.error(e);
                        }
                });
        })

        $('#btnInfo').click(function() {
                $('#modalImage').modal('show');
        })
</script>