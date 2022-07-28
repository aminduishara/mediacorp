<div class="m-5">

<?php echo form_open_multipart('ImageUpload/do_upload');?>

<?php 

$no = 3;
for($i=0; $i < $no; $i++){?>
        <div class="card  mt-4">
        <img class="card-img-top">
        <div class="card-body">
        <h5 class="card-title">Upload Image <?php echo $i+1?></h5>

        <div class="row">
                
                <div class="col-md-6">
                        <input class="form-control mb-5" type="file" id="ImgFile<?php echo $i+1?>" onchange="preview<?php echo $i+1?>()" required>        
                </div>

                <div class="col-md-2">
                        <button class="btn btn-danger" onclick="clearImage<?php echo $i+1?>()">Remove</button>      
                </div>

        </div>
        <div class="row mt-5">              

                <div class="col-md-4 mb-3">
                        <img id="Image<?php echo $i+1?>" class="img-fluid"/>
                </div>

        </div>

        </div>
        </div>


<?php
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
            background-color:#0000FF" value="Upload Images" id="butupload">
            </div>
        </div> 

        
<?php echo form_close();?>
</div>    

        

<script  type="text/javascript">
            function preview1() {
                Image1.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage1() {
                document.getElementById('ImgFile1').value = null;
                $Image1.src = "";
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
                // Ajax post
                $(document).ready(function() 
                {
                $("#butupload").click(function() 
                {
                        var Image1 = document.getElementById('ImgFile1').value;
                        var Image2 = document.getElementById('ImgFile2').value;
                        var Image3 = document.getElementById('ImgFile3').value;

                        var i = 0;
                        i++;

                        jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url('/index.php/Form/SaveImages'); ?>",
                        dataType: 'html',
                        data: {

                                id: i,
                                ImgFile1:Image1,
                                ImgFile2:Image2,
                                ImgFile3:Image3   
                
                        },
                        success: function(res) 
                        {
                                if(res==1)
                                {
                                alert('All Images uploaded successfully');
                                document.getElementById("butupload").disabled = true;
                                document.getElementById("butupload").value = 'Uploaded';	
                                document.getElementById("butupload").style.color = "#00FF00";
                                }
                                else
                                {
                                alert('Image Upload Fail');	
                                }
                                
                        },
                        error:function()
                        {
                        alert('Upload Fail');	
                        }
                        });
                })
                });
</script>

