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

  
  public function SaveDescriptionData()
  {

    $data = array(
      'aplicent_id'=> $this->input->post('id', TRUE), 
      'aplicant_nam'=> $this->input->post('fullName', TRUE), 
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
    $img1 = $this->input->post('ImgFile1');
    $img2 = $this->input->post('ImgFile2');
    $img3 = $this->input->post('ImgFile3');

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

    fwrite($userImageFile1, $img1);
    fwrite($userImageFile2, $img2);
    fwrite($userImageFile3, $img3);

    fclose($userImageFile1);
    fclose($userImageFile2);
    fclose($userImageFile3);

    // $link= "http://images5.fanpop.com/image/photos/31100000/random-random-31108109-500-502.jpg";
    // $destdir = 'images-folder/';
    // $img=file_get_contents($link);
    // file_put_contents($destdir.substr($link, strrpos($link,'/')), $img);




  }

}


/* End of file Form.php */
/* Location: ./application/controllers/Form.php */