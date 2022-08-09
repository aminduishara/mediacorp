<form class="p-4" id="desForm">
        <input type="text" name="hiddenContentID" id="hiddenContentID" value="0" hidden>
        <div class="row" style="display:<?php echo $visibility ?>">
                <div class="form-group col-sm-12">
                        <label for="exampleInputName" class="form-label">Label</label><br>
                        <select class="form-select" name="label" id="label" required="required">
                                <option value="0">Select the Label</option>
                        </select>
                </div>
        </div>
        <div class="row mt-5">
                <div class="col-sm-12">
                        <div class="wrapper">
                                <div class="input-data">
                                        <input type="text" name="des" id="des" required="required">
                                        <div class="underline"></div>
                                        <label class="form-label">Description</label>
                                </div>
                        </div>
                </div>
        </div>
        <div class="row mt-4 mb-4">
                <div class="form-group col-sm-12 text-end">
                        <input type="button" class="text-white btn btn-md btn-info px-5" value="Add Description" id="butAdd">
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
                                <input type="button" class="text-white btn btn-md btn-dark px-5" value="Back" onclick="Back(2)" id="Back">
                        </div>
                </div>
                <div class="col">
                        <div class="form-group col-12 text-end">
                                <input type="button" class="text-white btn btn-md btn-primary px-5" value="Save & Next" onclick="Next(2)" id="Next">
                        </div>
                </div>

        </div>
</form>



<script type="text/javascript">
        $(document).ready(function() {
                $('#butAdd').click(function() {

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
                                                                RefreshTable();

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
                document.getElementById('butAdd').value = "Update";

                jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url('/index.php/Form/GetContent'); ?>",
                        data: {
                                contentID: hiddenContentID
                        },
                        success: function(data) {
                                var json_data = JSON.parse(data);

                                //console.log(json_data[0]['aplicent_content_id']);

                                document.getElementById('hiddenContentID').value = json_data[0]['aplicent_content_id'];
                                document.getElementById('des').value = json_data[0]['aplicent_content_content'];
                                document.getElementById('label').value = json_data[0]['cat_mast_label_id'];

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