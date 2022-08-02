<form class="rounded p-5 m-5 shadow-sm">
    
    <input type="text" name="hiddenContentID" id="hiddenContentID" hidden>

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

<!-- <div class="m-5">
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
            background-color:green" value="Check Content" id="checkC" onclick="CheckContentStatus()">
            </div>
</div>  -->

<div id="hello"></div>

<div id="customers-list"></div>

<div id="tableCont">
<table class="table rounded shadow-sm text-center align-content-center" id="DesTable">
  <thead>
    <tr>
      <th scope="col" hidden>Content ID</th>
      <th scope="col">Applicant ID</th>
      <th scope="col">Lable ID</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="Des_tbody">
  </tbody>
</table>
</div>

</div>

<script type="text/javascript">

                $(document).ready(function()
                {
                        $('#butAdd').click(function()
                        {
                                // var id = document.getElementById('userID').value;
                                // var description = document.getElementById('des').value;

                                // var contentHiddenValue = document.getElementById('hiddenContentID').value;


                                // if(id == 0000){
                                //         alert("Please fill the General Information Form First");
                                //         location.reload();
                                // }else{
                                //         if(contentHiddenValue == 0){

                                //                 jQuery.ajax({
                                //                         type:'POST',
                                //                         url:"<?php echo base_url('/index.php/Form/SaveDescription'); ?>",
                                //                         dataType:'html',
                                //                         data:{
                                //                                 id:id,
                                //                                 des:description
                                //                         },
                                //                         success: function(res) 
                                //                         {
                                //                                 if(res==1)
                                //                                 {
                                //                                         alert('Description Added');
                                //                                         RefreshTable();
                                //                                 }
                                //                                 else
                                //                                 {
                                //                                         alert('Description Adding Faliure');	
                                //                                 }
                                                                
                                //                         },
                                //                         error:function()
                                //                         {
                                //                                 alert('Error Occured when Adding');	
                                //                         }
                                //                 });

                                //         }else{
                                //                 jQuery.ajax({
                                //                         type:'POST',
                                //                         url:"<?php echo base_url('/index.php/Form/UpdateDescription'); ?>",
                                //                         dataType:'html',
                                //                         data:{
                                //                                 hiddenContentID:contentHiddenValue,
                                //                                 des:description
                                //                         },
                                //                         success:function(res) 
                                //                         {
                                //                                 if(res == 1)
                                //                                 {
                                //                                         alert('Description Updated');
                                //                                         RefreshTable();
                                //                                         document.getElementById('hiddenContentID').value = 0;
                                //                                 }
                                //                                 else
                                //                                 {
                                //                                         alert('Description Update Fail. Try Again');
                                //                                         RefreshTable();	
                                //                                         document.getElementById('hiddenContentID').value = 0;
                                //                                 }
                                                                
                                //                         },
                                //                         error:function()
                                //                         {
                                //                         alert('Error Occured when Updataing');	
                                //                         }
                                //                 });

                                //         }
                                        
                                
                                // }
                                CheckContentStatus();

                        });
                });


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
                                                var json_data = JSON.parse(data);
                                                console.log(json_data);

                                                document.getElementById('Des_tbody').innerHTML = json_data["data"].
                                                map(row => 
                                                `<tr>
                                                <td hidden>${row['aplicent_content_id']}</td>
                                                <td>${row['aplicent_id']}</td>
                                                <td>${row['cat_mast_label_id']}</td>
                                                <td>${row['aplicent_content_content']}</td>
                                                <td>
                                                        <button type="button" class="btn btn-primary" onclick="EditDes(${row['aplicent_content_id']})">Edit</button>
                                                        <button type="button" class="btn btn-danger" onclick="RemoveDes(${row['aplicent_content_id']})">Remove</button>
                                                 </td>
                                                 </tr>`).join(""); 
                                        },
                                        error:function()
                                        {
                                        alert('Error Occured');	
                                        }
                                        });

                                }

                }

                function EditDes(id){
                        //const id = $(this).closest('tr').find('td').eq(1).text();
                        //alert(id);

                        var hiddenContentID = id;
                        document.getElementById('butAdd').value = "Update";

                        jQuery.ajax({
                                        type:'POST',
                                        url:"<?php echo base_url('/index.php/Form/GetContent'); ?>",
                                        data:{
                                                contentID:hiddenContentID
                                        },
                                        success: function(data) 
                                        {
                                                var json_data = JSON.parse(data);

                                                //console.log(json_data[0]['aplicent_content_id']);

                                                document.getElementById('hiddenContentID').value = json_data[0]['aplicent_content_id'];
                                                document.getElementById('des').value = json_data[0]['aplicent_content_content'];

                                        },
                                        error:function()
                                        {
                                        alert('Error Occured');	
                                        }
                        });
                }

                function RemoveDes(id){

                        var contentID = id;

                        jQuery.ajax({
                                        type:'POST',
                                        url:"<?php echo base_url('/index.php/Form/RemoveDescription'); ?>",
                                        data:{
                                                contentID:contentID
                                        },
                                        success: function(res) 
                                        {
                                                if(res==1)
                                                {
                                                        alert('Description Deleted');
                                                        RefreshTable();
                                                }
                                                else
                                                {
                                                        alert('Description Deletion Fail. Try Again');
                                                        RefreshTable();	
                                                }

                                        },
                                        error:function()
                                        {
                                        alert('Error Occured');	
                                        }
                        });

                }

                function CheckContentStatus(){

                        jQuery.ajax({
                                type:"POST",
                                url:"<?php echo base_url('/index.php/Form/CheckContent'); ?>",
                                data:{
                                        id:document.getElementById('hiddenContentID').value
                                },
                                success:function(data){

                                        var id = document.getElementById('userID').value;
                                        var description = document.getElementById('des').value;

                                        var contentHiddenValue = document.getElementById('hiddenContentID').value;

                                        if(data > 0){
                                                //alert("Already have a data");
                                                jQuery.ajax({
                                                        type:'POST',
                                                        url:"<?php echo base_url('/index.php/Form/UpdateDescription'); ?>",
                                                        dataType:'html',
                                                        data:{
                                                                hiddenContentID:contentHiddenValue,
                                                                des:description
                                                        },
                                                        success:function(res) 
                                                        {
                                                                if(res == 1)
                                                                {
                                                                        document.getElementById('butAdd').value = "Add"
                                                                        alert('Description Updated');
                                                                        RefreshTable();
                                                                        document.getElementById('hiddenContentID').value = 0;
                                                                }
                                                                else
                                                                {
                                                                        alert('Description Update Fail. Try Again');
                                                                        RefreshTable();	
                                                                        document.getElementById('hiddenContentID').value = 0;
                                                                }
                                                                
                                                        },
                                                        error:function()
                                                        {
                                                        alert('Error Occured when Updataing');	
                                                        }
                                                });
                                        }else{
                                                //alert(data);
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
                                                                        RefreshTable();
                                                                }
                                                                else
                                                                {
                                                                        alert('Description Adding Faliure');	
                                                                }
                                                                
                                                        },
                                                        error:function()
                                                        {
                                                                alert('Error Occured when Adding');	
                                                        }
                                                });
                                        }
                                        
                                },
                                error:function(){
                                        alert("Content Check Error");
                                }
                        });
                }



</script>