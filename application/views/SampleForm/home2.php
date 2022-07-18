<?php include 'application/views/Layout/htmlHeader.php'; ?>

<div class="container pt-5 pb-5">
<h3 class="text-white text-center">General Information</h3>
</div>


<div class="container col-md-12  pb-5">
    <form class="card p-5 rounded shadow-lg form-background">
        <div class="row">

        <div class="col-md-2">
            <lable>Type</lable>
        </div>

        <div class="col-md-6">
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
            <div class="form-group col-md-12">
                <label for="exampleInputName" class="form-label">Economy</label><br>
                        <select class="form-select select-border" name="economy">
                          <option value="China">China</option>
                          <option value="Australia">Australia</option>
                          <option value="Myanmar">Myanmar</option>
                        </select>
            </div>
        </div>

        <div class="row mt-4">
            <div class="form-group col-md-6">
                <label for="exampleInputName" class="form-label">Category</label><br>
                        <select class="form-select select-border" name="economy" >
                          <option value="Consumer">Consumer</option>
                          <option value="Technology-AI">Technology-AI</option>
                          <option value="Technology-IOT">Technology-IOT</option>
                        </select>
            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputName" class="form-label">Sub Category</label><br>
                        <select class="form-select select-border" name="economy">
                          <option value="Cat1">Category 1</option>
                          <option value="Cat2">Category 2</option>
                          <option value="Cat3">Category 3</option>
                        </select>
            </div>

        </div>

        <div class="row mt-4">
            <div class="form-group col-md-12">
                <label class="form-label">Project Name</label>
                <input type="text" name="ProjectName" id="pname" class="form-control">
            </div>
        </div>

        <div class="row mt-4">
            <div class="form-group col-md-6">
                <label class="form-label">Application Validation Email</label>
                <input type="email" name="ApplicationEmail" id="aemail" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Web-Site</label>
                <input type="url" name="WebSite" id="weburl" class="form-control">
            </div>
        </div>

        <div class="row mt-4">
            <div class="form-group col-md-12">
                <label class="form-label">Organization / Individual (Institute/School/University)</label>
                <input type="text" name="Organization" id="org" class="form-control">
            </div>
        </div>

        <div class="row mt-4">
            <div class="form-group col-md-6">
                <label class="form-label">Number of Employees</label>
                <input type="number" name="NoEmployees" id="nemp" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Date (Incorporation of the Organization)</label>
                <input type="date" name="Date" id="date" class="form-control">
            </div>
        </div>

        <div class="row mt-4">
            <div class="form-group col-md-6">
                <label class="form-label">Address</label>
                <label class="form-label">(Street Address Line 1)</label>
                <input type="text" name="Address1" id="add1" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">(Street Address Line 2)</label>
                <input type="text" name="Address2" id="add2" class="form-control">
            </div>
        </div>

        <div class="row mt-4">
            <div class="form-group col-md-3">
                <label class="form-label">City</label>
                <input type="text" name="City" id="city" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label class="form-label">State/Province</label>
                <input type="text" name="State" id="state" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Zip Code</label>
                <input type="text" name="ZipCode" id="zip" class="form-control">
            </div>
        </div>

        
        <div class="row mt-4">
            <div class="form-group col-md-12">
                <lable>Name of the Applicant (Contact Person)</lable>
            </div>
        </div>
        <div class="row mt-2">
            <div class="form-group col-md-6">
                <lable>First Name</lable>
                <input type="text" name="FirstName" id="fname" class="form-control mt-2">
            </div>
            <div class="form-group col-md-6">
                <lable>Last Name</lable>
                <input type="text" name="LastName" id="lname" class="form-control mt-2">
            </div>
        </div>
        <div class="row mt-4">
            <div class="form-group col-md-6">
                <lable>Designation</lable>
                <input type="text" name="Designation" id="designation" class="form-control mt-2">
            </div>
            <div class="form-group col-md-3">
                <lable>Mobile No</lable>
                <input type="tel" name="Mobile" id="lname" class="form-control mt-2">
            </div>
            <div class="form-group col-md-3">
                <lable>Telephone No</lable>
                <input type="tel" name="Telephone" id="lname" class="form-control mt-2">
            </div>
        </div>

        <div class="row mt-4 mb-6">
            <div class="form-group col-md-12 text-center">
            <button type="submit" class="text-white" style="width: 150px;
            height: 40px;
            padding: 7px 10px;
            border-radius: 25px;
            border:none;
            font-size: 15px;
            text-align: center;
            background-color:black">Next</button>
            </div>
        </div>
    </form>    
</div>
<?php include 'application/views/Layout/htmlFooter.php' ?>