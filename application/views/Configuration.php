<?php include 'application/views/Layout/htmlHeader.php'; ?>


<script>
    function updateLable(id, text, visibility, reqStatus, order, type, code) {


        
        $("#lableTable").on('click','.btnSelect',function(){
            var currentRow=$(this).closest("tr");             
            var id=currentRow.find("th:eq(0)").html(); // get current row 1st table cell TD value
            var text=currentRow.find("td:eq(0)").html(); // get current row 2nd table cell TD value
            var visibility=currentRow.find("td:eq(5)").html(); // get current row 3rd table cell  TD value
            var reqStatus=currentRow.find("td:eq(6)").html(); // get current row 3rd table cell  TD value
            var order=currentRow.find("td:eq(3)").html(); // get current row 3rd table cell  TD value
            var type=currentRow.find("td:eq(4)").html(); // get current row 3rd table cell  TD value
            var code=currentRow.find("td:eq(7)").html(); // get current row 3rd table cell  TD value
            
            $('#lableType').val(type);        
            $('#lableID').val(id);
            $('#lableName').val(text);
            $('#lableVisibility').val(visibility);
            $('#lableRequired').val(reqStatus);
            $('#lableOrder').val(order);
            $('#labletxtArea').val(code);

        });

    }

    function RefreshTable() {

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('/index.php/Configuration/getAllLables'); ?>",
            success: function(data) {
                var json_data = JSON.parse(data);
                //console.log(json_data);
                //alert(json_data["data"]);
                if (json_data["allLableData"].length) $('#lableTable tbody').append('<tr>No records</tr>');

                $('#lableTable tbody').append(json_data["allLableData"].map(row =>
                    `<tr>
                                                <th scope="row">${row['mas_reglable_id']}</td>
                                                <td>${row['mas_reglable_text']}</td>
                                                <td>${row['mas_reglable_visibility'] == 1 ? 'Show' : 'Hidden'}</td>
                                                <td>${row['mas_reglable_required'] == 1 ? 'Required' : 'Not-Required'}</td>
                                                <td>${row['mas_reglable_order']}</td>                                                
                                                <td>${row['mas_reglable_type']}</td>                                               
                                                <td hidden>${row['mas_reglable_visibility']}</td>                                    
                                                <td hidden>${row['mas_reglable_required']}</td>                                    
                                                <td hidden>${row['mas_reglable_code']}</td>
                                                <td>
                                                        <button type="button" class="btn btn-primary btnSelect" onclick="updateLable()">Edit</button>
                                                </td>
                                        </tr>`).join(""))
            },
            error: function() {

                alert('Error Occured');

            }

        });


    }


    function updateLableRecord() {

    id = $('#lableID').val();
    text = $('#lableName').val();
    visibility = $('#lableVisibility').val();
    reqStatus = $('#lableRequired').val();
    order = $('#lableOrder').val();
    type = $('#lableType').val();
    code = $('#labletxtArea').val();

    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url('/index.php/Configuration/updateLable'); ?>",
        dataType: 'json',
        data: {

            mas_reglable_id: id,
            mas_reglable_text: text,
            mas_reglable_visibility: visibility,
            mas_reglable_required:reqStatus,
            mas_reglable_order: order,
            mas_reglable_type: type,
            mas_reglable_code: String(code)

        },
        success: function(res) {
            location.reload();
        },
        error: function() {
            alert('data not saved');
        }
    });

    }

    function SetCode() {

        id = $('#lableID').val();
        text = $('#lableName').val();
        type = $('#lableInputType').val();

        
        var text = text.split(" ").join("");
        var htmlTxtName = text;
        var htmlTxtID = text+"-"+id;

        if(id == ''){
            alert("Please Select a Label");
        }else if(text == '') {
            alert("Please Enter the Name");
        }else {
                jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/index.php/Configuration/getInputTypes'); ?>",
                dataType: 'html',
                data: {

                    mas_inputtype_id: type

                },
                success: function(data) {
                    var json_data = JSON.parse(data);
                    var inputType = "";
                    json_data["InputTypesData"].map(
                        row => inputType = String(row['mas_inputtype_code'])
                    );
                
                    var htmlTag = inputType.replace("txtName", htmlTxtName.trim());
                    var FinalhtmlTag = htmlTag.replace("txtID", htmlTxtID.trim());
                    
                    $('#labletxtArea').val(FinalhtmlTag)
                },
                error: function() {
                    alert('Error');
                }
                });
        }


    }


</script>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <form class="form-control" method="POST">

                <label>Type</label>
                <select id="lableType" name="lableType" class="form-control mb-4">
                    <script>
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url('/index.php/Configuration/getAllTypes'); ?>",
                            success: function(data) {
                                var json_data = JSON.parse(data);
                                //console.log(json_data);

                                document.getElementById('lableType').innerHTML = '<option value="0">Select the Type</option>' + json_data["allTypeData"].map(
                                    row =>
                                    `<option value="${row['mas_aplicanttype_id']}">${row['mas_aplicanttype_name']}</option>`
                                );
                            },
                            error: function() {

                                document.getElementById('lableType').innerHTML = `<option value="00">Empty</option>`;

                            }

                        });
                    </script>
                </select>

                <input type="text" id="lableID" name="lableID" class="form-control mb-4" hidden>

                <label>Name</label>
                <input type="text" id="lableName" name="lableName" class="form-control mb-4">

                <label>Visibility</label>
                <select id="lableVisibility" name="lableVisibility" class="form-control mb-4">
                    <option value="1" >Show</option>
                    <option value="0">Hidden</option>
                </select>

                <label>Required Status</label>
                <select id="lableRequired" name="lableRequired" class="form-control mb-4">
                    <option value="1">Required</option>
                    <option value="0">Not-Required</option>
                </select>

                <label>Order</label>
                <input type="number" id="lableOrder" name="lableOrder" class="form-control mb-4">

                <label>Input Field Type</label>
                <select id="lableInputType" name="lableInputType" class="form-control mb-4"  onchange="SetCode()">
                    <script>
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url('/index.php/Configuration/getAllInputTypes'); ?>",
                            success: function(data) {
                                var json_data = JSON.parse(data);
                                //console.log(json_data);

                                document.getElementById('lableInputType').innerHTML = '<option value="0">Select the Input Field Type</option>' + json_data["allInputTypesData"].map(
                                    row =>
                                    `<option value="${row['mas_inputtype_id']}">${row['mas_inputtype_name']}</option>`
                                );
                            },
                            error: function() {

                                document.getElementById('lableInputType').innerHTML = `<option value="00">Empty</option>`;

                            }

                        });
                    </script>
                </select>

                <div class="form-group mb-5">
                    <label for="exampleFormControlTextarea1">Code</label>
                    <textarea class="form-control" id="labletxtArea" name="labletxtArea" rows="8" disabled></textarea>
                </div>
                <div class="col-md-12 text-center mb-5">
                    <button type="button" class="btn btn-info" onclick="updateLableRecord()">Update</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-hover table-dark round" style="position: fixed;
                                                                    height: 800px;
                                                                    overflow: auto;
                                                                    display: block;" id="lableTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Visibility</th>
                        <th scope="col">Required</th>
                        <th scope="col">Order</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <script>
                        RefreshTable()
                    </script>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'application/views/Layout/htmlFooter.php' ?>