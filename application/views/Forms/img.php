<form class="p-5 m-5">

<div class="card  mt-4">
  <img class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Upload Image 1</h5>

    <div class="row">
        
        <div class="col-md-4">
                <input class="form-control mb-5" type="file" id="ImgFile1" onchange="preview1()">        
        </div>

        <div class="col-md-4">
                <button class="btn btn-danger" onclick="clearImage1()">Remove</button>      
        </div>

        <div class="col-md-4 mb-3">
                    <img id="Image1" class="img-fluid"/>
        </div>

    </div>

  </div>
</div>

<div class="card  mt-4">
  <img class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Upload Image 2</h5>

    <div class="row">
        
        <div class="col-md-4">
                <input class="form-control mb-5" type="file" id="ImgFile2" onchange="preview2()">        
        </div>

        <div class="col-md-4">
                <button class="btn btn-danger" onclick="clearImage2()">Remove</button>      
        </div>

        <div class="col-md-4 mb-3">
                    <img id="Image2" class="img-fluid"/>
        </div>

    </div>

  </div>
</div>

<div class="card mt-4">
  <img class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Upload Image 3</h5>

    <div class="row">
        
        <div class="col-md-4">
                <input class="form-control mb-5" type="file" id="ImgFile3" onchange="preview3()">        
        </div>

        <div class="col-md-4">
                <button class="btn btn-danger" onclick="clearImage3()">Remove</button>      
        </div>

        <div class="col-md-4 mb-3">
                    <img id="Image3" class="img-fluid"/>
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
            background-color:#0000FF">Upload</button>
            </div>
        </div> 

</form>    

<script>
            function preview1() {
                    Image1.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage1() {
                    document.getElementById('ImgFile1').value = null;
                    Image1.src = "";
            }

            function preview2() {
                    Image2.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage2() {
                    document.getElementById('ImgFile2').value = null;
                    Image2.src = "";
            }

            function preview3() {
                    Image3.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage3() {
                    document.getElementById('ImgFile3').value = null;
                    Image3.src = "";
            }
</script>

