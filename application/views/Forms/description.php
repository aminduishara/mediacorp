<form class="rounded p-5 m-5 shadow-sm">
    
    <input type="text" name="hiddenID" id="hiddenID" hidden>

    <div class="row"  style="display:<?php echo $visibility?>">
        <div class="form-group col-sm-12">
            <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                <select class="form-select" name="economy">
                    <option value="China">China</option>
                    <option value="Australia">Australia</option>
                    <option value="Myanmar">Myanmar</option>
                </select>
        </div>
    </div>

    

    <div class="row mt-5">
        <div class="col-sm-12">
            <div class="wrapper">
                <div class="input-data">
                    <input type="text" name="des" id="des" required>
                    <div class="underline"></div>
                    <label class="form-label">Description</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-4">
            <div class="form-group col-sm-12 text-center">
            <input type="button" class="text-white float-end" 
            style="width: 150px;
            height: 40px;
            padding: 7px 10px;
            border-radius: 25px;
            border:none;
            font-size: 15px;
            text-align: center;
            background-color:#0000FF" value="Add" id="butAdd">
            </div>
        </div> 
</form>

<div class="m-5">
<div class="row mt-4 mb-4">
            <div class="form-group col-sm-12 text-center">
            <input type="button" class="text-white float-start" 
            style="width: 150px;
            height: 40px;
            padding: 7px 10px;
            border-radius: 25px;
            border:none;
            font-size: 15px;
            text-align: center;
            background-color:green" value="Referesh" id="butRefresh" onclick="RefreshTable()">
            </div>
</div> 
<div id="hello"></div>

<div id="customers-list"></div>
<!-- 
<div id="tableCont">
<table class="table rounded shadow-sm text-center align-content-center" id="DesTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <button class="btn btn-sm btn-danger">Delete</button>
        <button class="btn btn-sm btn-primary">Edit</button>
      </td>
    </tr>
  </tbody>
</table>
</div> -->

</div>


<script type="text/javascript">

                $(document).ready(function()
                {
                        $('#butAdd').click(function()
                        {
                                var id = document.getElementById('userID').value;
                                var description = document.getElementById('des').value;

                                if(id == 0000){
                                        alert("Please fill the General Information Form First");
                                        location.reload();
                                }else{

                                        jQuery.ajax({
                                        type:'POST',
                                        url:"<?php echo base_url('/index.php/Form/SaveDescription'); ?>",
                                        dataType:'html',
                                        data:{
                                                id:id,
                                                des:description
                                        },
                                        success: function(res) 
                                        {
                                                if(res==1)
                                                {
                                                        alert('Description Added');
                                                }
                                                else
                                                {
                                                        alert('Description Adding Faliure');	
                                                }
                                                
                                        },
                                        error:function()
                                        {
                                        alert('Error Occured');	
                                        }
                                });
                                
                                }

                        });
                });

                // $(document).ready(function()
                // {
                //         $('#butRefresh').click(function()
                //         {
                //                 var id = document.getElementById('userID').value;

                //                 if(id == 0000){

                //                         document.getElementById('hello').innerHTML = "Empty Description Table";

                //                 }else{
                //                         jQuery.ajax({
                //                         type:'POST',
                //                         url:"<?php echo base_url('/index.php/Form/GetUserDes'); ?>",
                //                         data:{
                //                                 id:id
                //                         },
                //                         success: function(data) 
                //                         {
                //                                 $('#customers-list').html(data);
                                                
                //                         },
                //                         error:function()
                //                         {
                //                         alert('Error Occured');	
                //                         }
                //                         });

                //                 }
                                

                                

                //         });
                // });

                // $(document).ready(function()
                // {
                //         $('#description-tab').click(function()
                //         {
                //                 var id = document.getElementById('userID').value;

                //                 if(id == 0000){

                //                         document.getElementById('hello').innerHTML = "Empty Description Table";

                //                 }else{
                //                         jQuery.ajax({
                //                         type:'POST',
                //                         url:"<?php echo base_url('/index.php/Form/GetUserDes'); ?>",
                //                         data:{
                //                                 id:id
                //                         },
                //                         success: function(data) 
                //                         {
                //                                 $('#customers-list').html(data);
                                                
                //                         },
                //                         error:function()
                //                         {
                //                         alert('Error Occured');	
                //                         }
                //                         });

                //                 }
                                

                                

                //         });
                // });

                function RefreshTable() {

                        var id = document.getElementById('userID').value;

                                if(id == 0000){

                                        document.getElementById('hello').innerHTML = "Empty Description Table";

                                }else{
                                        jQuery.ajax({
                                        type:'POST',
                                        url:"<?php echo base_url('/index.php/Form/GetUserDes'); ?>",
                                        data:{
                                                id:id
                                        },
                                        success: function(data) 
                                        {
                                                $('#customers-list').html(data);
                                                
                                        },
                                        error:function()
                                        {
                                        alert('Error Occured');	
                                        }
                                        });

                                }
                }



</script>