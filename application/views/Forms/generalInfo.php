    <form class="rounded p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="col">
                    <label>Type <span class="text text-danger">*</span></label>
                </div>

                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aplicent_type" id="aplicent_type1" value="1" checked>
                        <label class="form-check-label" for="aplicent_type1">
                            PERFORMANCE CATEGORIES
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aplicent_type" id="aplicent_type2" value="2">
                        <label class="form-check-label" for="aplicent_type2">
                            PROGRAMME CATEGORIES
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aplicent_type" id="aplicent_type3" value="3">
                        <label class="form-check-label" for="aplicent_type3">
                            CREATIVE CATEGORIES
                        </label>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <label for="category">Category <span class="text text-danger">*</span></label>
                <select class="form-select" name="category" id="category">
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="project_name" id="project_name" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="project_name">Title of Programme Nominated <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 prc" style="display: none">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="date" name="aplicent_date" id="aplicent_date" value="<?php echo date('Y-m-d') ?>" onchange="this.setAttribute('value', '<?php echo date('m/d/Y') ?>');">
                        <div class="underline"></div>
                        <label for="aplicent_date">Date of Transmission (Chosen Episode) <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 pc">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="first_name" id="first_name" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="first_name" id="first_namelabel">Name of Presenter/Actor <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="col-md-6 nrp">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="last_name" id="last_name" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="last_name">Name of Role Played <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="organization" id="organization" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="organization">Company <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="address_line2" id="address_line2" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="address_line2">Address <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="zip_code" id="zip_code" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="zip_code">Postal Code <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="address_line1" id="address_line1" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="address_line1">Contact No <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="applicant_email" id="applicant_email" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="applicant_email">Email Address <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="contact_person" id="contact_person" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="contact_person">Contact Person <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="mobile_no" id="mobile_no" value="" onchange="this.setAttribute('value', this.value);">
                                <div class="underline"></div>
                                <label for="mobile_no">Mobile No <span class="text text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="telephone_no" id="telephone_no" value="" onchange="this.setAttribute('value', this.value);">
                                <div class="underline"></div>
                                <label for="telephone_no">Telephone No <span class="text text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="designation" id="designation" value="" onchange="this.setAttribute('value', this.value);">
                        <div class="underline"></div>
                        <label for="designation">Designation <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-4">
            <div class="form-group col-md-12 text-end">
                <input type="button" class="text-white btn btn-md btn-primary px-5 mt-5" value="Save & Next" id="butsave">
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/index.php/Form/GetCate'); ?>",
                data: {
                    id: 1
                },
                success: function(data) {
                    var json_data = JSON.parse(data);

                    document.getElementById('category').innerHTML = '<option value="">Select Category</option>' + json_data["dataCate"].map(
                        row =>
                        `<option value="${row['cat_id']}">${row['cat_name']}</option>`
                    );
                },
                error: function(e) {
                    document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;
                    console.log(e);
                }

            });

            $.ajax({
                type: "post",
                url: "<?php echo base_url('/index.php/Form/GetTerms'); ?>",
                data: {
                    id: 1
                },
                success: function(data) {
                    var json_data = JSON.parse(data);
                    $('#decDeclaration').html(json_data['mas_aplicanttype_termandconditions']);
                    $('#aplicent_date').attr('min', json_data['mas_aplicanttype_eligibledatefrom']);
                    $('#aplicent_date').attr('max', json_data['mas_aplicanttype_eligibledateto']);
                },
                error: function(e) {
                    console.log(e);
                }
            });
        })

        $('input[name="aplicent_type"]').change(function() {
            let val = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('/index.php/Form/GetCate'); ?>",
                data: {
                    id: val
                },
                success: function(data) {
                    var json_data = JSON.parse(data);
                    //console.log(json_data);

                    document.getElementById('category').innerHTML = '<option value="">Select Category</option>' + json_data["dataCate"].map(
                        row =>
                        `<option value="${row['cat_id']}">${row['cat_name']}</option>`
                    );
                },
                error: function(e) {
                    console.log(e);
                }
            });
        })

        $('input[name="aplicent_type"]').change(function() {
            $('#first_namelabel').html('Name of Presenter/Actor <span class="text text-danger">*</span>')
            $('.nrp').show('slow');
            if ($(this).val() == 1) {
                $('.pc').show('slow');
                $('.prc').hide('slow');
            } else if ($(this).val() == 2) {
                $('.pc').hide('slow');
                $('.prc').show('slow');
            } else if ($(this).val() == 3) {
                $('.pc').show('slow');
                $('.prc').show('slow');
                $('#first_namelabel').html('Name(s) of Production Personnel <span class="text text-danger">*</span>')
                $('.nrp').hide('slow');
            } else {
                $('.pc').hide('slow');
                $('.prc').hide('slow');
            }
            $.ajax({
                type: "post",
                url: "<?php echo base_url('/index.php/Form/GetTerms'); ?>",
                data: {
                    id: $(this).val()
                },
                success: function(data) {
                    var json_data = JSON.parse(data);
                    $('#decDeclaration').html(json_data['mas_aplicanttype_termandconditions']);
                    $('#aplicent_date').attr('min', json_data['mas_aplicanttype_eligibledatefrom']);
                    $('#aplicent_date').attr('max', json_data['mas_aplicanttype_eligibledateto']);
                },
                error: function(e) {
                    console.log(e);
                }
            });
        })

        function pad(num, size) {
            var s = num + "";
            while (s.length < size) s = "0" + s;
            return s;
        }

        $("#butsave").click(function() {
            let aplicent_type;

            if (document.getElementById("aplicent_type1").checked) {
                aplicent_type = document.getElementById("aplicent_type1").value;
            } else {
                aplicent_type = document.getElementById("aplicent_type2").value;
            }
            const val = Math.floor(1000 + Math.random() * 9000);
            let id = val;
            let type = aplicent_type;
            let category = $("#category").val();
            let projectName = $("#project_name").val();
            let aplicent_date = $("#aplicent_date").val();
            let applicantEmail = $("#applicant_email").val();
            let organization = $("#organization").val();
            let address1 = $("#address_line1").val();
            let address2 = $("#address_line2").val();
            let zipCode = $("#zip_code").val();
            let fullName = $("#first_name").val();
            let lastName = $("#last_name").val();
            let designation = $("#designation").val();
            let mobileNo = $("#mobile_no").val();
            let teleNo = $("#telephone_no").val();
            let contact_person = $("#contact_person").val();

            if (!category) {
                alert('Please select a category');
                document.getElementById("category").focus();
                return;
            }
            if (!aplicent_date && type == 2) {
                alert('Please enter date of transmission');
                document.getElementById("aplicent_date").focus();
                return;
            }
            if (!projectName) {
                alert('Please enter program title');
                document.getElementById("project_name").focus();
                return;
            }
            if (!fullName && (type == 1 || type == 3)) {
                alert('Please enter a name of presenter/actor');
                document.getElementById("first_name").focus();
                return;
            }
            if (!lastName && type == 1) {
                alert('Please enter a name of role played');
                document.getElementById("last_name").focus();
                return;
            }
            if (!organization) {
                alert('Please enter an company');
                document.getElementById("organization").focus();
                return;
            }
            if (!address2) {
                alert('Please enter an address');
                document.getElementById("address_line2").focus();
                return;
            }
            if (!zipCode) {
                alert('Please enter a postal code');
                document.getElementById("zip_code").focus();
                return;
            }
            if (!address1) {
                alert('Please enter contact no');
                document.getElementById("address_line1").focus();
                return;
            }
            if (!applicantEmail) {
                alert('Please enter an email');
                document.getElementById("applicant_email").focus();
                return;
            }
            if (!contact_person) {
                alert('Please enter a contact person');
                document.getElementById("contact_person").focus();
                return;
            }
            if (!mobileNo) {
                alert('Please enter a mobile no');
                document.getElementById("mobile_no").focus();
                return;
            }
            if (!teleNo) {
                alert('Please enter a telephone no');
                document.getElementById("telephone_no").focus();
                return;
            }
            if (!designation) {
                alert('Please enter a designation');
                document.getElementById("designation").focus();
                return;
            }



            if ($('#aplicentID').val() == -1) {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/index.php/Form/SaveFormData'); ?>",
                    dataType: 'html',
                    data: {
                        id: id,
                        type: type,
                        category: category,
                        projectName: projectName,
                        applicantEmail: applicantEmail,
                        organization: organization,
                        address1: address1,
                        address2: address2,
                        zipCode: zipCode,
                        fullName: fullName,
                        lastName: lastName,
                        designation: designation,
                        mobileNo: mobileNo,
                        teleNo: teleNo,
                        aplicent_date: aplicent_date

                    },
                    success: function(res) {
                        var json_result = JSON.parse(res);

                        console.log(json_result);
                        $('#aplicentID').val(json_result["aplicent_id"]);
                        $('#refNo').val(json_result["refno"]);
                        console.log(json_result["insertQuery"]);
                        console.log(json_result["updatequery"]);
                        $('.nav-tabs li:eq(1) a').tab('show');
                        getLabels();

                    },
                    error: function(e) {
                        alert('Error Occurred');
                        console.error(e);
                    }
                });

            } else {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/index.php/Form/UpdateAplicentData'); ?>",
                    dataType: 'html',
                    data: {

                        id: id,
                        aplicent_id: $('#aplicentID').val(),
                        type: type,
                        category: category,
                        projectName: projectName,
                        applicantEmail: applicantEmail,
                        organization: organization,
                        address1: address1,
                        address2: address2,
                        zipCode: zipCode,
                        fullName: fullName,
                        lastName: lastName,
                        designation: designation,
                        mobileNo: mobileNo,
                        teleNo: teleNo,
                        aplicent_date: aplicent_date

                    },
                    success: function(res) {
                        var json_result = JSON.parse(res);
                        console.log(json_result["updatequery"]);
                        // alert("Data Updated");
                        getLabels();
                        $('.nav-tabs li:eq(1) a').tab('show');

                    },
                    error: function(e) {
                        alert('Error Occurred');
                        console.error('Error Occurred' + e);
                    }
                });

            }
        });

        function getLabels() {
            jQuery.ajax({
                type: 'POST',
                url: "<?php echo base_url('/index.php/Form/GetLabel'); ?>",
                data: {
                    id: $('#category').val(),
                    aplicant_id: $('#aplicentID').val()
                },
                success: function(data) {
                    json_data = JSON.parse(data);
                    console.log(json_data);

                    document.getElementById("butAdd").disabled = false;
                    var json_data = JSON.parse(data);
                    document.getElementById('label').innerHTML = '<option value="0">Select the Label</option>' + json_data["dataLabel"].map(
                        post => {
                            if (post["aplicent_id"] == null) {
                                return `<option value="${post["cat_mast_label_id"]}">${post["cat_mast_label_name"]}</option>`;
                            }
                        })



                },
                error: function() {
                    alert('Error Occured');
                }
            });

        }
    </script>