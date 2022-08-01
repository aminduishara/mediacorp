<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Form
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Form extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

  
  public function SaveFormData()
  {


    $data = array(
      'aplicent_id'=> "",
      'aplicent_ref'=> $this->input->post('id', TRUE),
      'aplicant_nam'=> $this->input->post('fullName', TRUE).' '.$this->input->post('lastName', TRUE), 
      'aplicent_type'=> $this->input->post('type', TRUE), 
      'mas_economy_id'=> $this->input->post('economy', TRUE), 
      'aplicant_cat'=> $this->input->post('category', TRUE), 
      'sub_cat_mast_id'=> $this->input->post('subCategory', TRUE), 
      'product_name'=> $this->input->post('projectName', TRUE), 
      'reg_email'=> $this->input->post('applicantEmail', TRUE), 
      'aplicent_website'=> $this->input->post('webSite', TRUE), 
      'aplicent_profile'=> $this->input->post('organization', TRUE), 
      'aplicent_size'=> $this->input->post('noEmployees', TRUE), 
      'aplicent_date'=> $this->input->post('date', TRUE), 
      'aplicent_add1'=> $this->input->post('address1', TRUE), 
      'aplicent_add2'=> $this->input->post('address2', TRUE), 
      'aplicent_city'=> $this->input->post('city', TRUE), 
      'aplicent_state'=> $this->input->post('province', TRUE), 
      'aplicent_postal'=> $this->input->post('zipCode', TRUE), 
      'aplicent_con_fname'=> $this->input->post('fullName', TRUE), 
      'aplicent_con_lname'=> $this->input->post('lastName', TRUE), 
      'aplicent_con_desig'=> $this->input->post('designation', TRUE), 
      'aplicent_con_mobile'=> $this->input->post('mobileNo', TRUE), 
      'aplicent_con_telno' => $this->input->post('teleNo', TRUE)

    );

    $this->load->model('Form_model');
  
    $result=$this->Form_model->saveData($data);

      if($result)
      {
      echo  1;	
      }
      else
      {
      echo  0;	
      }

  }

  public function SaveImages(){
    
    $id = $this->input->post('id');
    $img1 = base64_decode($this->input->post('ImgFile1', TRUE));
    $img2 = base64_decode($this->input->post('ImgFile2', TRUE));
    $img3 = base64_decode($this->input->post('ImgFile3', TRUE));

    $splitImg1 = pathinfo($img1);
    $splitImg2 = pathinfo($img2);
    $splitImg3 = pathinfo($img3);

    $FilePath = base_url('assets/UserImages/'.$id);
    mkdir($FilePath);

    $ImagePath1 = $FilePath."/".$splitImg1['filename'].".".$splitImg1['extension'];
    $ImagePath2 = $FilePath."/".$splitImg2['filename'].".".$splitImg2['extension'];
    $ImagePath3 = $FilePath."/".$splitImg3['filename'].".".$splitImg3['extension'];

    $userImageFile1 = fopen($ImagePath1, "w") or die("Fail to add the image to forlder");
    $userImageFile2 = fopen($ImagePath2, "w") or die("Fail to add the image to forlder");
    $userImageFile3 = fopen($ImagePath3, "w") or die("Fail to add the image to forlder");

    $result1 = fwrite($userImageFile1, $img1);
    $result2 = fwrite($userImageFile2, $img2);
    $result3 = fwrite($userImageFile3, $img3);

    fclose($userImageFile1);
    fclose($userImageFile2);
    fclose($userImageFile3);

    if($result1 == TRUE && $result2 == TRUE &&  $result3 == TRUE){
      echo 1;
    }
    else{
      echo 0;
    }
    // $link= "http://images5.fanpop.com/image/photos/31100000/random-random-31108109-500-502.jpg";
    // $destdir = 'images-folder/';
    // $img=file_get_contents($link);
    // file_put_contents($destdir.substr($link, strrpos($link,'/')), $img);




  }

  public function SaveDescription(){

    $id = $this->input->post('id', TRUE);
    $des = $this->input->post('des', TRUE);

    $data = array(
      'aplicent_content_id'=>'',
      'aplicent_id'=>$id,
      'cat_mast_label_id'=>$id,
      'aplicent_content_content'=>$des,
      'aplicent_content_status'=>1
    );

    $this->load->model('Form_model');
    $result = $this->Form_model->insertDes($data);

    if($result){

      echo 1;
      
    }else{

      echo 0;

    }

  }

  public function GetUserDes(){

    $id = $this->input->post('id', TRUE);
    $query = $this->db->query('SELECT `aplicent_content_id`,`aplicent_id`, `cat_mast_label_id`, `aplicent_content_content` FROM `aplicent_content` WHERE `aplicent_id` = '.$id.'');

    $json_data['data'] =  $query->result();
    echo json_encode($json_data);
  
  }

  public function GetImages(){

    $ImgFile1 = $this->input->post('ImgFile1', TRUE);
    $ImgFile2 = $this->input->post('ImgFile2', TRUE);
    $ImgFile3 = $this->input->post('ImgFile3', TRUE);

    
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
  
    $img1 = $this->upload->do_upload($ImgFile1);
    $img2 = $this->upload->do_upload($ImgFile2);
    $img3 = $this->upload->do_upload($ImgFile3);


    $this->load->library('upload', $config);

    if ($img1 == TRUE && $img2 == TRUE && $img3 == TRUE)
    {
            // $error = array('error' => $this->upload->display_errors());

            // $this->load->view('upload_form', $error);.
            echo "<script>alert('Succefully Images Uploaded')</script>";
    }
    else
    {
            // $data = array('upload_data' => $this->upload->data());

            // $this->load->view('upload_success', $data);
            echo "<script>alert('Upload Faliure')</script>";
    }

  }

  public function GetContent(){

    $contentID = $this->input->post('contentID', TRUE);

    $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE `aplicent_content_id` = '.$contentID.'');

    echo json_encode($query->result());

  }

  public function UpdateDescription(){

    $contentID = $this->input->post('hiddenContentID', TRUE);
    $description = $this->input->post('des', TRUE);

    $this->load->model('Form_model');
    $result = $this->Form_model->UpdateUser($contentID,$description);

    //$query = $this->db->query('UPDATE `aplicent_content` SET `aplicent_content_content`='.$description.' WHERE `aplicent_content_id`= '.$contentID.'');

    if($result){

      echo 1;

    }else{

      echo 0;

    }
    
  }

  public function RemoveDescription(){

    $contentID = $this->input->post('contentID', TRUE);
    if($this->db->query('DELETE FROM `aplicent_content` WHERE `aplicent_content_id` = '.$contentID.'')){
      echo 1;

    }else{

      echo 0;

    }
  }

  public function CheckContent(){
    $id = $this->input->post('contentID', TRUE);

    echo '<script>alert('. $id .')</script>';

    $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE `aplicent_content_id`'.$id.'');

    echo '<script>alert('.$query->num_rows().')</script>';
  }

}


/* End of file Form.php */
/* Location: ./application/controllers/Form.php */