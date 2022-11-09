<form class="p-4" id="desForm">
        <input type="text" name="hiddenContentID" id="hiddenContentID" value="0" hidden>
        <div class="row">
                <div class="form-group col-sm-12">
                        <label for="label" class="form-label">Label</label>
                        <select class="form-select" name="label" id="label" required="required">
                                <option value="0">Select the Label</option>
                        </select>
                </div>
        </div>
        <div class="row mt-2">
                <div class="col-sm-12">
                        <label class="form-label" for="des">Word Count: <span id="requiredCount" style="font-weight: bold;">0</span></label>
                        <textarea name="des" id="des" rows="8" required="required" class="form-control"></textarea>
                        <div>Remaining Word Count: <span id="typedCount" style="font-weight: bold"></span></div>
                        <!-- <div class="wrapper">
                                <div class="input-data">
                                        <input type="text" name="des" id="des" onclick="wordCount()" >
                                        <div class="underline"></div>
                                        <label class="form-label">Description</label>
                                        <div><span id="typedCount"></span>/<span id="requiredCount"></span></div>

                                </div>
                        </div> -->
                </div>
        </div>
        <div class="row mt-4 mb-4">
                <div class="form-group col-sm-12 text-end">
                        <input type="button" class="text-white btn btn-md btn-info px-5" value="Add" id="butAdd">
                </div>
        </div>
        <div id="table-responsive" style="height: 35vh; max-height: 35vh; overflow-y: auto;">
                <table class="table" id="DesTable">
                        <thead class="table-dark">
                                <tr>
                                        <th scope="col" hidden>Content ID</th>
                                        <th scope="col" hidden>Applicant ID</th>
                                        <th scope="col">Label</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                </tr>
                        </thead>
                        <tbody id="Des_tbody">

                        </tbody>
                </table>
        </div>

        <div class="row mt-4">
                <div class="col">
                        <div class="form-group col-12">
                                <input type="button" class="text-white btn btn-md btn-dark" value="Back" id="Back">
                        </div>
                </div>
                <div class="col">
                        <div class="form-group col-12 text-end">
                                <input type="button" class="text-white btn btn-md btn-primary" value="Save & Next" id="Next">
                        </div>
                </div>

        </div>
</form>



<script type="text/javascript">
        var tempDesc = "";
        $('#des').on('keyup', function(e) {
                var required = parseInt($('#requiredCount').html().trim());
                var value = $(this).val().trim();

                if (value != "") {
                        let count = parseInt(value.split(' ').length);
                        $('#typedCount').html(required - count);
                        // if (required < count) {
                        //         alert('Maximum word count exceeded.');
                        //         return;
                        // }
                } else {
                        $('#typedCount').html('0');
                }
        });

        $('#Back').click(function() {
                $('.nav-tabs li:eq(0) a').tab('show');
        })
        $('#Next').click(function() {
                if ($('#DesTable tbody tr').length > 0) {
                        $.ajax({
                                type: "post",
                                url: "<?php echo base_url('/index.php/Form/checkrequiredLabel'); ?>",
                                dataType: 'json',
                                data: {
                                        id: $('#category').val()
                                },
                                async: false,
                                success: function(response) {
                                        var json_data = JSON.parse(data);
                                        console.log(json_data);
                                },
                                error: function() {
                                        alert("Invalid!");
                                }
                        });
                        // $.ajax({
                        //         type: "post",
                        //         url: "<?php echo base_url('/index.php/Form/getUploadTypes'); ?>",
                        //         dataType: 'json',
                        //         async: false,
                        //         success: function(response) {
                        //                 $('#ddlType').empty();
                        //                 $('#ddlType').append('<option value="0">Select Type</option>');
                        //                 response['uploadTypes'].forEach((type) => {
                        //                         $('#ddlType').append(`<option value="${type['mas_uploadtype_id']}">${type['mas_uploadtype_des']}</option>`)
                        //                 });
                        //         },
                        //         error: function() {
                        //                 alert("Invalid!");
                        //         }
                        // });
                        // $('.nav-tabs li:eq(2) a').tab('show');
                } else {
                        swal('Warning', 'Please add the labels.', 'warning');
                }
        })

        $('#label').change(function() {
                // var typedString = document.getElementById('des').value;
                var selectedLabel = document.getElementById('label').value;
                var wordCount = 0;
                // document.getElementById('typedCount').innerHTML = '0';

                jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url('/index.php/Form/GetWordCount'); ?>",
                        dataType: 'html',
                        data: {
                                selectedLabel: selectedLabel
                        },
                        success: function(data) {
                                json_data = JSON.parse(data);
                                console.log(json_data["wordCount"][0]["cat_mast_label_conlength"]);
                                wordCount = json_data["wordCount"][0]["cat_mast_label_conlength"];

                                document.getElementById('requiredCount').innerHTML = wordCount;
                                document.getElementById('typedCount').innerHTML = wordCount;
                                $('#des').attr('placeholder', json_data["wordCount"][0]['cat_mast_label_Instruction']);
                                // document.getElementById('typedCount').innerHTML = typedString.split(' ').length;
                        },
                        error: function() {
                                alert('Error Occured. Please try again.');
                                // document.getElementById('des').value = '';
                        }
                });
        });

        $(document).ready(function() {
                $('#butAdd').click(function() {
                        if (parseInt($('#typedCount').html()) < 0) {
                                alert('Please add description within the given word count.');
                                return;
                        }
                        var id = document.getElementById('refNo').value;
                        var description = document.getElementById('des').value;
                        var label = document.getElementById('label').value;
                        var aplicentID = document.getElementById('aplicentID').value;

                        var contentHiddenValue = document.getElementById('hiddenContentID').value;



                        if (id == 0000) {
                                alert("Please fill the General Information Form First");
                                window.location.reload();
                        } else {
                                if ($('#des').val() == '' && $('#des').attr('required') == "required") {
                                        alert('Please fill all the required data');
                                } else {

                                        if (contentHiddenValue == 0) {
                                                jQuery.ajax({
                                                        type: 'POST',
                                                        url: "<?php echo base_url('/index.php/Form/SaveDescription'); ?>",
                                                        dataType: 'html',
                                                        data: {
                                                                des: description,
                                                                label: label,
                                                                aplicentID: aplicentID
                                                        },
                                                        success: function(res) {
                                                                SaveDesDataQuery = JSON.parse(res);
                                                                console.log(SaveDesDataQuery);
                                                                document.getElementById('des').value = '';

                                                                // document.getElementById('label').innerHTML = labelData.map(
                                                                //         (row,index) =>{
                                                                //                 if(row['cat_mast_label_id'] == label){
                                                                //                         delete labelData[index];
                                                                //                 }else{
                                                                //                         return `<option value="${row['cat_mast_label_id']}">${row['cat_mast_label_name']}</option>`;
                                                                //                 }
                                                                // });
                                                                RefreshTable();
                                                                getLabels();

                                                        },
                                                        error: function() {
                                                                alert('Error Occured. Please try again.');
                                                                document.getElementById('des').value = '';
                                                        }
                                                });

                                        } else {
                                                jQuery.ajax({
                                                        type: 'POST',
                                                        url: "<?php echo base_url('/index.php/Form/UpdateDescription'); ?>",
                                                        dataType: 'html',
                                                        data: {
                                                                hiddenContentID: contentHiddenValue,
                                                                des: description,
                                                                label: label
                                                        },
                                                        success: function(res) {
                                                                UpdateDescription = JSON.parse(res);
                                                                console.log(UpdateDescription);
                                                                document.getElementById('butAdd').value = "Add Description"
                                                                RefreshTable();
                                                                document.getElementById('hiddenContentID').value = 0;
                                                                document.getElementById('des').value = '';
                                                                getLabels();

                                                        },
                                                        error: function() {
                                                                alert('Description Update Fail. Try Again');
                                                                RefreshTable();
                                                                document.getElementById('hiddenContentID').value = 0;
                                                                document.getElementById('des').value = '';
                                                        }
                                                });
                                        }
                                }
                        }
                });
        });

        function RefreshTable() {

                var id = document.getElementById('refNo').value;


                jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url('/index.php/Form/GetUserDes'); ?>",
                        data: {
                                id: id
                        },
                        success: function(data) {
                                var json_data = JSON.parse(data);
                                //console.log(json_data);
                                //alert(json_data["data"]);
                                if (json_data["data"].length) $('#DesTable tbody').append('<tr>No records</tr>');
                                document.getElementById('Des_tbody').innerHTML = json_data["data"].
                                map(row =>
                                        `<tr>
                                                <td hidden>${row['aplicent_content_id']}</td>
                                                <td>${row['cat_mast_label_name']}</td>
                                                <td>${row['aplicent_content_content']}</td>
                                                <td>
                                                        <button type="button" class="btn btn-primary" onclick="EditDes(${row['aplicent_content_id']})">Edit</button>
                                                        <button type="button" class="btn btn-danger" onclick="RemoveDes(${row['aplicent_content_id']})">Remove</button>
                                                </td>
                                                <td hidden>${row['cat_mast_label_id']}</td>
                                                </tr>`).join("");


                        },
                        error: function() {
                                alert('Error Occured');
                        }
                });



        }

        function EditDes(id) {
                //const id = $(this).closest('tr').find('td').eq(1).text();
                //alert(id);

                var hiddenContentID = id;
                var labelName = labelName;

                console.log(labelName);
                console.log(hiddenContentID);

                document.getElementById('butAdd').value = "Update Description";

                jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url('/index.php/Form/GetContent'); ?>",
                        data: {
                                contentID: hiddenContentID
                        },
                        success: function(data) {
                                var json_data = JSON.parse(data);

                                //console.log(json_data[0]['aplicent_content_id']);
                                console.log(json_data);
                                document.getElementById('hiddenContentID').value = json_data['data1'][0]['aplicent_content_id'];
                                document.getElementById('des').value = json_data['data1'][0]['aplicent_content_content'];
                                document.getElementById('label').value = json_data['data1'][0]['cat_mast_label_id'];
                                document.getElementById('label').innerHTML = `<option value="${json_data['data1'][0]['cat_mast_label_id']}">${json_data['data2'][0]['cat_mast_label_name']}</option>`;

                        },
                        error: function() {
                                alert('Error Occured');
                        }
                });
        }

        function RemoveDes(id) {

                var contentID = id;
                alert("Do you wish to continue");

                jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url('/index.php/Form/RemoveDescription'); ?>",
                        data: {
                                contentID: contentID
                        },
                        success: function(res) {
                                if (res == 1) {
                                        alert('Description Deleted');
                                        RefreshTable();
                                        getLabels();
                                } else {
                                        alert('Description Deletion Fail. Try Again');
                                        RefreshTable();
                                }

                        },
                        error: function() {
                                alert('Error Occured');
                        }
                });

        }
</script>