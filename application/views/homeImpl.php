<?php include 'application/views/Layout/htmlHeader.php'; ?>

    <div class="container pt-5 pb-5">
        <h3 class="text-center">General Information</h3>
    </div>
      <div class="container mb-5">

    <form class="card p-5 rounded shadow-lg">
    <?php 
    if($lableData->num_rows() > 0){
        foreach($lableData->result() as $row){
            if($row->mas_reglable_id == 1){
                if($row->mas_reglable_visibility == 0){
                    $visibility = "none";
                }
                else {
                    $visibility = "";
                }?>

            <div class="row" style="display:<?php echo $visibility?>">

            <div class="col-sm-4">
                <lable><?php echo $row->mas_reglable_text?></lable>
            </div>

            <div class="col-sm-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" required>
                    <label class="form-check-label" for="inlineRadio1">Student</label>
                </div><br>

                <div class="form-check form-check-inline" >
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" required>
                    <label class="form-check-label" for="inlineRadio2">Organization or Individual</label>
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
                }?>

                        <div class="row mt-5">
                            <div class="form-group col-sm-12">
                                <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                                        <select class="form-select" name="economy">
                                        <option value="China">China</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Myanmar">Myanmar</option>
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
                }?>
                    <div class="col-sm-6" style="display:<?php echo $visibility?>">
                        <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                                <select class="form-select" name="economy">
                                <option value="Consumer">Consumer</option>
                                <option value="Technology-AI">Technology-AI</option>
                                <option value="Technology-IOT">Technology-IOT</option>
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
                }?>

                

                    <div class="form-group col-sm-6" style="display:<?php echo $visibility?>">
                        <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                                <select class="form-select" name="economy">
                                <option value="Cat1">Category 1</option>
                                <option value="Cat2">Category 2</option>
                                <option value="Cat3">Category 3</option>
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
                }?>

                <div class="row mt-4"  style="display:<?php echo $visibility?>">
                    <div class="col-sm-12">
                    <div class="wrapper">
                        <div class="input-data">
                            <input type="text" name="ProjectName" id="pname" required>
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
                }?>

                    <div class="col-sm-6" style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="email" name="ApplicationEmail" id="aemail" required>
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
                }?>                

                <div class="form-group col-sm-6" style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="WebSite" id="weburl" required>
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
                }?>
                        <div class="row mt-5"  style="display:<?php echo $visibility?>">
                            <div class="col-sm-12">
                                <div class="wrapper">
                                    <div class="input-data">
                                        <input type="text" name="Organization" id="org" required>
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
                }?>
                
                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="number" name="NoEmployees" id="nemp" required>
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
                }?>


                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="date" name="Date" id="date" placeholder=none required>
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
                }?>

                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="text" name="Address1" id="add1" required>
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
                }?>

                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                            <div class="wrapper">
                                <div class="input-data">
                                <input type="text" name="Address2" id="add2" required>
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
                }?>


                <div class="col-sm-3"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="text" name="City" id="city" required>
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
                }?>

                <div class="col-sm-3"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="text" name="State" id="state" required>
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
                }?>

                <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="text" name="ZipCode" id="zip" required>
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
                }?>

                <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="text" name="FirstName" id="fname" required>
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
                }?>
                    <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="text" name="LastName" id="lname" required>
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
                }?>
                <div class="col-sm-6"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                            <input type="text" name="Designation" id="designation" required>
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
                }?>

                <div class="col-sm-3"  style="display:<?php echo $visibility?>">
                    <div class="wrapper">
                        <div class="input-data">
                        <input type="tel" name="Mobile" id="mobile" required>
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
                }?>

                <div class="form-group col-sm-3"  style="display:<?php echo $visibility?>">
                        <div class="wrapper">
                            <div class="input-data">
                            <input type="tel" name="Telephone" id="lname" required>
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
            <button type="submit" class="text-white float-end" 
            style="width: 150px;
            height: 40px;
            padding: 7px 10px;
            border-radius: 25px;
            border:none;
            font-size: 15px;
            text-align: center;
            background-color:#00AEEF">Next</button>
            </div>
        </div> 
    </form>
</div>
<?php include 'application/views/Layout/htmlFooter.php' ?>