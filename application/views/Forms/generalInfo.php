<form class="rounded p-4">
    <?php
    if ($lableData->num_rows() > 0) {
        foreach ($lableData->result() as $row) {
            if ($row->mas_reglable_id == 1) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                <div class="row" style="display:<?php echo $visibility ?>">

                    <div class="col-sm-4">
                        <lable><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></lable>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="aplicent_type1" value="1" checked <?php echo $status; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Organization
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="aplicent_type2" value="2" <?php echo $status; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Other
                            </label>
                        </div>

                    </div>

                </div>


            <?php
            } else if ($row->mas_reglable_id == 2) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                <div class="row mt-5" style="display:<?php echo $visibility ?>">
                    <div class="form-group col-sm-12">
                        <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text ?></label><?php echo $requiredicon; ?><br>
                        <select class="form-select" name="economy_id" id="economy_id" <?php echo $status; ?>>
                            <script>
                                jQuery.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('/index.php/Form/GetEconomy'); ?>",
                                    success: function(data) {
                                        var json_data = JSON.parse(data);
                                        //console.log(json_data);

                                        document.getElementById('economy_id').innerHTML = '<option value="0">Select the <?php echo $row->mas_reglable_text ?></option>' + json_data["dataEconomy"].map(
                                            row =>
                                            `<option value="${row['mas_economy_id']}">${row['mas_economy_name']}</option>`
                                        );
                                    },
                                    error: function() {

                                        document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;

                                    }

                                });
                            </script>

                        </select>
                    </div>
                </div>


                <div class="row mt-4">

                <?php

            } else if ($row->mas_reglable_id == 3) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>
                    <div class="col-sm-6" style="display:<?php echo $visibility ?>">
                        <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text ?></label><?php echo $requiredicon; ?><br>
                        <select class="form-select" name="category" id="category" onchange="GetSubCate()" onclick="GetSubCate()" <?php echo $status; ?>>
                            <script>
                                jQuery.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('/index.php/Form/GetCate'); ?>",
                                    success: function(data) {
                                        var json_data = JSON.parse(data);
                                        //console.log(json_data);

                                        document.getElementById('category').innerHTML = '<option value="0">Select the <?php echo $row->mas_reglable_text ?></option>' + json_data["dataCate"].map(
                                            row =>
                                            `<option value="${row['cat_id']}">${row['cat_name']}</option>`
                                        );
                                    },
                                    error: function() {

                                        document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;

                                    }

                                });
                            </script>
                        </select>
                    </div>


                <?php

            } else if ($row->mas_reglable_id == 4) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>



                    <div class="form-group col-sm-6" style="display:<?php echo $visibility ?>">
                        <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text ?></label><?php echo $requiredicon; ?><br>
                        <select class="form-select" name="subCategory" id="sub_category" <?php echo $status; ?>>
                            <option value="0">Select the <?php echo $row->mas_reglable_text ?></option>
                        </select>
                    </div>

                </div>



            <?php

            } else if ($row->mas_reglable_id == 5) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                <div class="row mt-4" style="display:<?php echo $visibility ?>">
                    <div class="col-sm-12 mt-3">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="ProjectName" id="project_name" onclick="GetSubCate()" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label">
                                    <?php echo $row->mas_reglable_text ?>
                                    <?php echo $requiredicon; ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">


                <?php

            } else if ($row->mas_reglable_id == 6) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="email" name="ApplicationEmail" id="applicant_email" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>

                <?php

            } else if ($row->mas_reglable_id == 7) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="form-group col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="WebSite" id="website_url" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else if ($row->mas_reglable_id == 8) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>
                <div class="row mt-5" style="display:<?php echo $visibility ?>">
                    <div class="col-sm-12 mt-3">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="Organization" id="organization" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">



                <?php

            } else if ($row->mas_reglable_id == 9) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="number" name="No_Employees" id="no_employees" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>



                <?php

            } else if ($row->mas_reglable_id == 10) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>


                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="date" name="Date" id="date" placeholder=none <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">

                <?php

            } else if ($row->mas_reglable_id == 11) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="Address1" id="address_line1" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>


                <?php

            } else if ($row->mas_reglable_id == 12) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="Address2" id="address_line2" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">


                <?php

            } else if ($row->mas_reglable_id == 13) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>


                    <div class="col-sm-3 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="City" id="city" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>


                <?php

            } else if ($row->mas_reglable_id == 14) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-3 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="State" id="state" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>


                <?php

            } else if ($row->mas_reglable_id == 15) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="ZipCode" id="zip_code" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">


                <?php

            } else if ($row->mas_reglable_id == 16) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="FirstName" id="first_name" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>



                <?php

            } else if ($row->mas_reglable_id == 17) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>
                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="LastName" id="last_name" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">


                <?php

            } else if ($row->mas_reglable_id == 18) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>
                    <div class="col-sm-6 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="Designation" id="designation" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>


                <?php

            } else if ($row->mas_reglable_id == 19) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="col-sm-3 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="tel" name="Mobile" id="mobile_no" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
                            </div>
                        </div>
                    </div>


                <?php

            } else if ($row->mas_reglable_id == 20) {
                if ($row->mas_reglable_visibility == 0) {
                    $visibility = "none";
                } else {
                    $visibility = "";
                }

                if ($row->mas_reglable_required == 1) {
                    $status =  'data-required="1"';
                    $requiredicon = '<i class="fa-solid fa-star-of-life"></i>';
                } else {
                    $status = 'data-required="0"';
                    $requiredicon = '';
                } ?>

                    <div class="form-group col-sm-3 mt-3" style="display:<?php echo $visibility ?>">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="tel" name="Telephone" id="telephone_no" <?php echo $status; ?>>
                                <div class="underline"></div>
                                <label class="form-label"><?php echo $row->mas_reglable_text ?><?php echo $requiredicon; ?></label>
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
        <div class="form-group col-sm-12 text-end">
            <input type="button" class="text-white btn btn-md btn-primary px-5 mt-5" value="Save & Next" id="butsave">
        </div>
    </div>

</form>


<script type="text/javascript">
    function GetSubCate() {
        var id = document.getElementById('category').value;
        //alert(id);
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('/index.php/Form/GetSubCate'); ?>",
            data: {
                id: id
            },
            success: function(data) {

                var json_data = JSON.parse(data);
                //alert(json_data["dataSubCate"]);

                document.getElementById('sub_category').innerHTML = '<option value="0">Select the Sub Category</option>' + json_data["dataSubCate"].map(
                    row =>
                    `<option value="${row['sub_cat_mast_id']}">${row['sub_cat_mast_name']}</option>`
                );


            },
            error: function() {
                document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;
            }
        });


        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('/index.php/Form/GetLabel'); ?>",
            data: {
                id: id
            },
            success: function(data) {

                var json_data = JSON.parse(data);
                //console.log(json_data);

                if (json_data["dataLabel"].length == 0) {

                    document.getElementById('label').innerHTML = '<option value="0">Select the Lable</option>';
                    document.getElementById("butAdd").disabled = true;

                } else {
                    document.getElementById("butAdd").disabled = false;
                    document.getElementById('label').innerHTML = json_data["dataLabel"].map(
                        row =>
                        `<option value="${row['cat_mast_label_id']}">${row['cat_mast_label_name']}</option>`
                    );
                }



            },
            error: function() {
                document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;
            }
        });

    }

    // Ajax post
    $(document).ready(function() {
        $("#butsave").click(function() {

            var aplicent_type;

            if (document.getElementById("aplicent_type1").checked) {
                aplicent_type = document.getElementById("aplicent_type1").value;
            } else {
                aplicent_type = document.getElementById("aplicent_type2").value;
            }
            const val = Math.floor(1000 + Math.random() * 9000);

            var currentdate = new Date();

            var datetime = currentdate.getFullYear() + "-" + (currentdate.getMonth() + 1) + "-" + currentdate.getDate() + " " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
            var id = val;
            var type = aplicent_type;
            var economy = document.getElementById("economy_id").value;
            var category = document.getElementById("category").value;
            var subCategory = document.getElementById("sub_category").value;
            var projectName = document.getElementById("project_name").value;
            var applicantEmail = document.getElementById("applicant_email").value;
            var webSite = document.getElementById("website_url").value;
            var organization = document.getElementById("organization").value;
            var noEmployees = document.getElementById("no_employees").value;
            var date = document.getElementById("date").value;
            var address1 = document.getElementById("address_line1").value;
            var address2 = document.getElementById("address_line2").value;
            var city = document.getElementById("city").value;
            var province = document.getElementById("state").value;
            var zipCode = document.getElementById("zip_code").value;
            var fullName = document.getElementById("first_name").value;
            var lastName = document.getElementById("last_name").value;
            var designation = document.getElementById("designation").value;
            var mobileNo = document.getElementById("mobile_no").value;
            var teleNo = document.getElementById("telephone_no").value;

            if ($('#economy_id').val() == '' && $('#economy_id').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("economy_id").focus();
                return;

            } else if ($('#category').val() == '' && $('#category').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("category").focus();
                return;


            } else if ($('#sub_category').val() == '' && $('#sub_category').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("sub_category").focus();
                return;


            } else if ($('#project_name').val() == '' && $('#project_name').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("project_name").focus();
                return;


            } else if ($('#applicant_email').val() == '' && $('#applicant_email').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("applicant_email").focus();
                return;


            } else if ($('#website_url').val() == '' && $('#website_url').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("website_url").focus();
                return;


            } else if ($('#organization').val() == '' && $('#organization').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("organization").focus();
                return;


            } else if ($('#no_employees').val() == '' && $('#no_employees').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("no_employees").focus();
                return;


            } else if ($('#date').val() == '' && $('#date').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("date").focus();
                return;


            } else if ($('#address_line1').val() == '' && $('#address_line1').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("address_line1").focus();
                return;


            } else if ($('#address_line2').val() == '' && $('#address_line2').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("address_line2").focus();
                return;


            } else if ($('#city').val() == '' && $('#city').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("city").focus();
                return;


            } else if ($('#state').val() == '' && $('#state').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("state").focus();
                return;


            } else if ($('#zip_code').val() == '' && $('#zip_code').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("zip_code").focus();
                return;



            } else if ($('#first_name').val() == '' && $('#first_name').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("first_name").focus();
                return;



            } else if ($('#last_name').val() == '' && $('#last_name').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("last_name").focus();
                return;


            } else if ($('#designation').val() == '' && $('#designation').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("designation").focus();
                return;



            } else if ($('#mobile_no').val() == '' && $('#mobile_no').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("mobile_no").focus();
                return;



            } else if ($('#telephone_no').val() == '' && $('#telephone_no').attr('data-required') == 1) {

                alert('Please fill all the required data');
                document.getElementById("telephone_no").focus();
                return;



            } else {

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/index.php/Form/SaveFormData'); ?>",
                    dataType: 'html',
                    data: {

                        id: id,
                        datetime: datetime,
                        type: type,
                        economy: economy,
                        category: category,
                        subCategory: subCategory,
                        projectName: projectName,
                        applicantEmail: applicantEmail,
                        webSite: webSite,
                        organization: organization,
                        noEmployees: noEmployees,
                        date: date,
                        address1: address1,
                        address2: address2,
                        city: city,
                        province: province,
                        zipCode: zipCode,
                        fullName: fullName,
                        lastName: lastName,
                        designation: designation,
                        mobileNo: mobileNo,
                        teleNo: teleNo

                    },
                    success: function(res) {
                        var json_result = JSON.parse(res);

                        console.log(json_result);
                        document.getElementById('aplicentID').value = json_result["aplicent_id"];
                        document.getElementById('refNo').value = json_result["refno"];
                        console.log(json_result["insertQuery"]);
                        console.log(json_result["updatequery"]);

                        alert("Data Added");
                        Next(1);

                    },
                    error: function() {
                        alert('data not saved');
                    }
                });

            }


        });
    });


    // $('#Next').on('click', function (e) {
    //     var triggerEl = document.querySelector('#myTab li:last-child a')
    //     bootstrap.Tab.getInstance(triggerEl).show()
    // })
</script>