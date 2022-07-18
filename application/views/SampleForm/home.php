<?php include 'application/views/Layout/htmlHeader.php'; ?>

    <div class="container pt-5 pb-5">
        <h3 class="text-center">General Information</h3>
    </div>
      <div class="container mb-5">

    <form class="card p-5 rounded shadow-lg">
        <div class="row">

        <div class="col-sm-4">
            <lable>Type*</lable>
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


        <div class="row mt-5">
            <div class="form-group col-sm-12">
                <label for="exampleInputName" class="form-label">Economy</label><br>
                        <select class="form-select" name="economy">
                          <option value="China">China</option>
                          <option value="Australia">Australia</option>
                          <option value="Myanmar">Myanmar</option>
                        </select>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-6">
                <label for="exampleInputName" class="form-label">Category</label><br>
                        <select class="form-select" name="economy">
                          <option value="Consumer">Consumer</option>
                          <option value="Technology-AI">Technology-AI</option>
                          <option value="Technology-IOT">Technology-IOT</option>
                        </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputName" class="form-label">Sub Category</label><br>
                        <select class="form-select" name="economy">
                          <option value="Cat1">Category 1</option>
                          <option value="Cat2">Category 2</option>
                          <option value="Cat3">Category 3</option>
                        </select>
            </div>

        </div>

        <div class="row mt-4">
            <div class="col-sm-12">
            <div class="wrapper">
                <div class="input-data">
                    <input type="text" name="ProjectName" id="pname" required>
                    <div class="underline"></div>
                    <label class="form-label">Project Name</label>
                </div>
            </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="email" name="ApplicationEmail" id="aemail" required>
                        <div class="underline"></div>
                        <label class="form-label">Application Validation Email</label>
                    </div>
                </div>                
            </div>

            <div class="form-group col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="WebSite" id="weburl" required>
                        <div class="underline"></div>
                        <label class="form-label">Web-Site</label>
                    </div>
                </div>  
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Organization" id="org" required>
                        <div class="underline"></div>
                        <label class="form-label">Organization / Individual (Institute/School/University)</label>
                    </div>
                </div> 
                
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="number" name="NoEmployees" id="nemp" required>
                        <div class="underline"></div>
                        <label class="form-label">Number of Employees</label>
                    </div>
                </div> 
            </div>

            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="date" name="Date" id="date" placeholder=none required>
                        <div class="underline"></div>
                        <label class="form-label">Date (Incorporation of the Organization)</label>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Address1" id="add1" required>
                        <div class="underline"></div>
                        <label class="form-label">Address (Street Address Line 1)</label>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Address2" id="add2" required>
                        <div class="underline"></div>
                        <label class="form-label">Street Address Line 2</label>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-3">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="City" id="city" required>
                        <div class="underline"></div>
                        <label class="form-label">City</label>
                    </div>
                </div> 
            </div>
            <div class="col-sm-3">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="State" id="state" required>
                        <div class="underline"></div>
                        <label class="form-label">State</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="ZipCode" id="zip" required>
                        <div class="underline"></div>
                        <label class="form-label">Zip Code</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="FirstName" id="fname" required>
                        <div class="underline"></div>
                        <label class="form-label">First Name</label>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="LastName" id="lname" required>
                        <div class="underline"></div>
                        <label class="form-label">Last Name</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Designation" id="designation" required>
                        <div class="underline"></div>
                        <label class="form-label">Designation</label>
                    </div>
                </div> 
            </div>
            <div class="col-sm-3">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="tel" name="Mobile" id="mobile" required>
                        <div class="underline"></div>
                        <label class="form-label">Mobile No</label>
                    </div>
                </div> 
            </div>
            <div class="form-group col-sm-3">
                <div class="wrapper">
                    <div class="input-data">
                    <input type="tel" name="Telephone" id="lname" required>
                        <div class="underline"></div>
                        <label class="form-label">Telephone No</label>
                    </div>
                </div> 
            </div>
        </div>

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