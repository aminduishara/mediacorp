<form class="rounded p-5 m-5 shadow-sm">
    <?php 
    if($lableData->num_rows() > 0){
        foreach($lableData->result() as $row){
            if($row->mas_reglable_id == 1){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

            <div class="row" style="display:<?php echo $visibility?>">

            <div class="col-sm-4">
                <lable><?php echo $row->mas_reglable_text?></lable>
            </div>

            <div class="col-sm-4">
                <div class="form-check form-check-inline" >
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="aplicent_type" value="1" <?php echo $status ?>>
                    <label class="form-check-label" for="inlineRadio2">Organization</label>
                </div><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="aplicent_type" value="2" <?php echo $status ?>>
                    <label class="form-check-label" for="inlineRadio1">Other</label>
                </div>
            </div>

            </div>
                

            <?php
            }
            else if($row->mas_reglable_id == 2){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }

                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                        <div class="row mt-5"  style="display:<?php echo $visibility?>">
                            <div class="form-group col-sm-12">
                                <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                                        <select class="form-select" name="economy_id" id="economy_id"  <?php echo $status ?>>

                                        <script>
                                            jQuery.ajax({
                                                type:"POST",
                                                url:"<?php echo base_url('/index.php/Form/GetEconomy'); ?>",
                                                success:function(data){
                                                    var json_data = JSON.parse(data);
                                                    //console.log(json_data);

                                                    document.getElementById('economy_id').innerHTML = json_data["dataEconomy"].map(
                                                        row=>
                                                        `<option value="${row['mas_economy_id']}">${row['mas_economy_name']}</option>`
                                                    );
                                                },
                                                error:function(){

                                                    document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;

                                                }
                                                
                                            });

                                        </script>

                                        </select>
                            </div>
                        </div>
                        

                <div class="row mt-4">                

            <?php

            }
            else if($row->mas_reglable_id == 3){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>
                    <div class="col-sm-6" style="display:<?php echo $visibility?>">
                        <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                                <select class="form-select" name="category" id="category" onchange="GetSubCate()" <?php echo $status ?>>
                                <script>
                                            jQuery.ajax({
                                                type:"POST",
                                                url:"<?php echo base_url('/index.php/Form/GetCate'); ?>",
                                                success:function(data){
                                                    var json_data = JSON.parse(data);
                                                    //console.log(json_data);

                                                    document.getElementById('category').innerHTML = json_data["dataCate"].map(
                                                        row=>
                                                        `<option value="${row['cat_id']}">${row['cat_name']}</option>`
                                                    );
                                                },
                                                error:function(){

                                                    document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;

                                                }
                                                
                                            });

                                        </script>
                                </select>
                    </div>
                

            <?php
                
            }
            else if($row->mas_reglable_id == 4){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                

                    <div class="form-group col-sm-6" style="display:<?php echo $visibility?>">
                        <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                                <select class="form-select" name="subCategory" id="sub_category" <?php echo $status ?>>
                                </select>
                    </div>

                </div>

                

            <?php
                
            }
            else if($row->mas_reglable_id == 5){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                <div class="row mt-4"  style="display:<?php echo $visibility?>">
                    <div class="col-sm-12">
                    <div class="wrapper">
                        <div class="input-data">
                            <input type="text" name="ProjectName" id="project_name"  <?php echo $status ?>>
                            <div class="underline"></div>
                            <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                        </div>
                    </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                

            <?php
                
            }
            else if($row->mas_reglable_id == 6){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                    <div class="col-sm-6" style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="email" name="ApplicationEmail" id="applicant_email" <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div>                
                    </div>

            <?php
                
            }
            else if($row->mas_reglable_id == 7){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>                

                <div class="form-group col-sm-6" style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="WebSite" id="website_url" <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div>  
                    </div>
                </div>

            <?php
                
            }
            else if($row->mas_reglable_id == 8){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>
                        <div class="row mt-5"  style="display:<?php echo $visibility?>">
                            <div class="col-sm-12">
                                <div class="wrapper">
                                    <div class="input-data">
                                        <input type="text" name="Organization" id="organization" <?php echo $status ?>>
                                        <div class="underline"></div>
                                        <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                                    </div>
                                </div> 
                                
                            </div>
                        </div>
                    <div class="row mt-4">

                

            <?php
                
            }
            else if($row->mas_reglable_id == 9){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>
                
                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="number" name="No_Employees" id="no_employees" <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div> 
                    </div>

                

            <?php
                
            }
            else if($row->mas_reglable_id == 10){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>


                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="date" name="Date" id="date" placeholder=none <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="row mt-5">

            <?php
                
            }
            else if($row->mas_reglable_id == 11){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="text" name="Address1" id="address_line1" <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div> 
                    </div>
                

            <?php
                
            }
            else if($row->mas_reglable_id == 12){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                            <div class="wrapper">
                                <div class="input-data">
                                <input type="text" name="Address2" id="address_line2" <?php echo $status ?>>
                                    <div class="underline"></div>
                                    <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="row mt-4">
                

            <?php
                
            }
            else if($row->mas_reglable_id == 13){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>


                <div class="col-sm-3"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="text" name="City" id="city" <?php echo $status ?>>
                            <div class="underline"></div>
                            <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                        </div>
                    </div> 
                </div>
                

            <?php
                
            }
            else if($row->mas_reglable_id == 14){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                <div class="col-sm-3"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="text" name="State" id="state" <?php echo $status ?>>
                            <div class="underline"></div>
                            <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                        </div>
                    </div>
                </div>
                

            <?php
                
            }
            else if($row->mas_reglable_id == 15){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="text" name="ZipCode" id="zip_code" <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                

            <?php
                
            }
            else if($row->mas_reglable_id == 16){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="text" name="FirstName" id="first_name" <?php echo $status ?>>
                            <div class="underline"></div>
                            <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                        </div>
                    </div> 
                </div>

                

            <?php
                
            }
            else if($row->mas_reglable_id == 17){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>
                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="text" name="LastName" id="last_name" <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                

            <?php
                
            }
            else if($row->mas_reglable_id == 18){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>
                <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                            <input type="text" name="Designation" id="designation" <?php echo $status ?>>
                            <div class="underline"></div>
                            <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                        </div>
                    </div> 
                </div>
                

            <?php
                
            }
            else if($row->mas_reglable_id == 19){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                <div class="col-sm-3"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="tel" name="Mobile" id="mobile_no" <?php echo $status ?>>
                            <div class="underline"></div>
                            <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                        </div>
                    </div> 
                </div>
                

            <?php
                
            }
            else if($row->mas_reglable_id == 20){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }
                
                if($row->mas_reglable_required == 1){
                    $status = "required";
                }else{
                    $status = "";
                }?>

                <div class="form-group col-sm-3"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="tel" name="Telephone" id="telephone_no" <?php echo $status ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text?></label>
                            </div>
                        </div> 
                    </div>
                </div>
                

            <?php
                
            }

        }
    }
    ?>


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
            background-color:#0000FF" value="save data" id="butsave">
            </div>
        </div> 

        
</form>


<script type="text/javascript">

function GetSubCate(){
    var id = document.getElementById('category').value;
    //alert(id);
    jQuery.ajax({
        type:"POST",
        url:"<?php echo base_url('/index.php/Form/GetSubCate'); ?>",
        data:{
            id:id
        },
        success:function(data){

            var json_data = JSON.parse(data);
            //console.log(json_data);

            document.getElementById('sub_category').innerHTML = json_data["dataSubCate"].map(
                row=>
                `<option value="${row['sub_cat_mast_id']}">${row['sub_cat_mast_name']}</option>`            
            );

        },
        error:function(){
            document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;
        }
    });
    

    jQuery.ajax({
        type:"POST",
        url:"<?php echo base_url('/index.php/Form/GetLabel'); ?>",
        data:{
            id:id
        },
        success:function(data){

            var json_data = JSON.parse(data);
            //console.log(json_data);

            if(json_data["dataLabel"].length == 0){

                document.getElementById('label').innerHTML = '<option value="0">Empty</option>'    

            }else{
                document.getElementById('label').innerHTML = json_data["dataLabel"].map(
                row=>
                `<option value="${row['cat_mast_label_id']}">${row['cat_mast_label_name']}</option>`            
            );
            }



        },
        error:function(){
            document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;
        }
    });

}

// Ajax post
$(document).ready(function() 
{
$("#butsave").click(function() 
{


        const val = Math.floor(1000 + Math.random() * 9000);

        var id= val;
        var type=document.getElementById("aplicent_type").value;
        var economy=document.getElementById("economy_id").value;
        var category=document.getElementById("category").value;
        var subCategory=document.getElementById("sub_category").value;
        var projectName=document.getElementById("project_name").value;
        var applicantEmail=document.getElementById("applicant_email").value;
        var webSite=document.getElementById("website_url").value;
        var organization=document.getElementById("organization").value;
        var noEmployees=document.getElementById("no_employees").value;
        var date=document.getElementById("date").value;
        var address1=document.getElementById("address_line1").value;
        var address2=document.getElementById("address_line2").value;
        var city=document.getElementById("city").value;
        var province=document.getElementById("state").value;
        var zipCode=document.getElementById("zip_code").value;
        var fullName=document.getElementById("first_name").value;
        var lastName=document.getElementById("last_name").value;
        var designation=document.getElementById("designation").value;
        var mobileNo=document.getElementById("mobile_no").value;
        var teleNo=document.getElementById("telephone_no").value

	
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/index.php/Form/SaveFormData'); ?>",
		dataType: 'html',
		data: {

            id: id,
            type: type,
            economy:economy,
            category:category,
            subCategory:subCategory,
            projectName:projectName,
            applicantEmail:applicantEmail,
            webSite:webSite,
            organization:organization,
            noEmployees:noEmployees,
            date:date,
            address1:address1,
            address2:address2,
            city:city,
            province:province,
            zipCode:zipCode,
            fullName:fullName,
            lastName:lastName,
            designation:designation,
            mobileNo:mobileNo,
            teleNo:teleNo     
        
        },
		success: function(res) 
		{
			if(res==1)
			{
			alert('Data saved successfully');
            document.getElementById("butsave").disabled = true;
            document.getElementById("butsave").value = 'Inserted';	
            document.getElementById("userID").value = id;
			}
			else
			{
			alert('Data not saved');	
			}
			
		},
		error:function()
		{
		alert('data not saved');	
		}
		});

});
});
</script>
