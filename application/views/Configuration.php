<?php include 'application/views/Layout/htmlHeader.php'; ?>


<script>
    function updateLable(id, text, visibility, reqStatus, order) {

        $('#lableID').val(id);
        $('#lableName').val(text);
        $('#lableVisibility').val(visibility);
        $('#lableRequired').val(reqStatus);
        $('#lableOrder').val(order);

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
                                                <td>
                                                        <button type="button" class="btn btn-primary" onclick="updateLable(${row['mas_reglable_id']},'${row['mas_reglable_text']}',${row['mas_reglable_visibility']},${row['mas_reglable_required']},${row['mas_reglable_order']})">Edit</button>
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


    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url('/index.php/Configuration/updateLable'); ?>",
        dataType: 'json',
        data: {

            mas_reglable_id: id,
            mas_reglable_text: text,
            mas_reglable_visibility: visibility,
            reqStatus:reqStatus,
            mas_reglable_order: order

        },
        success: function(res) {
            location.reload();
        },
        error: function() {
            alert('data not saved');
        }
    });



    }

</script>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <form class="form-control" method="POST">
                <label>Lable ID</label>
                <input type="text" id="lableID" name="lableID" class="form-control mb-4" disabled>
                <label>Lable Name</label>
                <input type="text" id="lableName" name="lableName" class="form-control mb-4">
                <label>Lable Visibility</label>
                <select id="lableVisibility" name="lableVisibility" class="form-control mb-4">
                    <option value="1">Show</option>
                    <option value="0">Hidden</option>
                </select>

                <label>Lable Required Status</label>
                <select id="lableRequired" name="lableRequired" class="form-control mb-4">
                    <option value="1">Required</option>
                    <option value="0">Not-Required</option>
                </select>
                <label>Lable Order</label>
                <input type="number" id="lableOrder" name="lableOrder" class="form-control mb-4">
                <div class="col-md-12 text-center">
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
                        <th scope="col">Lable ID</th>
                        <th scope="col">Lable Name</th>
                        <th scope="col">Lable Visibility</th>
                        <th scope="col">Lable Required</th>
                        <th scope="col">Lable Order</th>
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