<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 5 image Upload with Preview</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://use.fontawesome.com/66fcf391bc.js"></script>
    </head>

    <body>

    <div class="card" style="width: 50rem;">
    <img class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>

        <div class="row">
            
            <div class="col-md-4">
                    <input class="form-control mb-5" type="file" id="Img1" onchange="preview()">        
            </div>

            <div class="col-md-4">
                    <button class="btn btn-danger">Remove</button>      
            </div>

            <div class="col-md-4 mb-3">
                        <img id="Image01" class="img-fluid"/>
            </div>

        </div>

        <i class="fa-solid fa-pen"></i>

    </div>
    </div>

        <div class="container col-md-6">
            <div class="mb-5">
                <label for="Image" class="form-label">Bootstrap 5 image Upload with Preview</label>
                <input class="form-control" type="file" id="formFile" onchange="preview()">
                <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button>
            </div>
            <img id="frame" src="" class="img-fluid" />
        </div>

        <script>
            function preview() {
                Image01.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script>
    </body>
</html> 