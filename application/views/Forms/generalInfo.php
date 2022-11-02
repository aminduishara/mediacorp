    <form class="rounded p-4">
        <div class="row">
            <div class="col-sm-6">
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
            <div class="col-sm-6">
                <label for="category">Category <span class="text text-danger">*</span></label>
                <select class="form-select" name="category" id="category">
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="project_name" id="project_name" value="">
                        <div class="underline"></div>
                        <label for="project_name">Title of Programme Nominated <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 pc">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="first_name" id="first_name" value="">
                        <div class="underline"></div>
                        <label for="first_name">Name of Presenter/Actor <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="last_name" id="last_name" value="">
                        <div class="underline"></div>
                        <label for="last_name">Name of Role Played <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="organization" id="organization" value="">
                        <div class="underline"></div>
                        <label for="organization">Company <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="address_line2" id="address_line2" value="">
                        <div class="underline"></div>
                        <label for="address_line2">Address <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="zip_code" id="zip_code" value="">
                        <div class="underline"></div>
                        <label for="zip_code">Postal Code <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="address_line1" id="address_line1" value="">
                        <div class="underline"></div>
                        <label for="address_line1">Contact No <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="applicant_email" id="applicant_email" value="">
                        <div class="underline"></div>
                        <label for="applicant_email">Email Address <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="contact_person" id="contact_person" value="">
                        <div class="underline"></div>
                        <label for="contact_person">Contact Person <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="mobile_no" id="mobile_no" value="">
                                <div class="underline"></div>
                                <label for="mobile_no">Mobile No <span class="text text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="telephone_no" id="telephone_no" value="">
                                <div class="underline"></div>
                                <label for="telephone_no">Telephone No <span class="text text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="designation" id="designation" value="">
                        <div class="underline"></div>
                        <label for="designation">Designation <span class="text text-danger">*</span></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-4">
            <div class="form-group col-sm-12 text-end">
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

                    document.getElementById('category').innerHTML = '<option value="0">Select Category</option>' + json_data["dataCate"].map(
                        row =>
                        `<option value="${row['cat_id']}">${row['cat_name']}</option>`
                    );
                },
                error: function(e) {
                    document.getElementById('economy_id').innerHTML = `<option value="00">Empty</option>`;
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

                    document.getElementById('category').innerHTML = '<option value="0">Select Category</option>' + json_data["dataCate"].map(
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
            if ($(this).val() == 1) {
                $('.pc').show('slow');
            } else {
                $('.pc').hide('slow');
            }
        })

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
            let category = document.getElementById("category").value;
            let projectName = document.getElementById("project_name").value;
            let applicantEmail = document.getElementById("applicant_email").value;
            let organization = document.getElementById("organization").value;
            let date = document.getElementById("date").value;
            let address1 = document.getElementById("address_line1").value;
            let address2 = document.getElementById("address_line2").value;
            let city = document.getElementById("city").value;
            let province = document.getElementById("state").value;
            let zipCode = document.getElementById("zip_code").value;
            let fullName = document.getElementById("first_name").value;
            let lastName = document.getElementById("last_name").value;
            let designation = document.getElementById("designation").value;
            let mobileNo = document.getElementById("mobile_no").value;
            let teleNo = document.getElementById("telephone_no").value;

            if (!category) {
                alert('Please fill all the required data');
                document.getElementById("category").focus();
                return;
            }
        });
    </script>