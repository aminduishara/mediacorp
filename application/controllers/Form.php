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


    $data1 = array(
      'date_time' => $this->input->post('datetime', TRUE),
      'aplicant_nam' => $this->input->post('fullName', TRUE) . ' ' . $this->input->post('lastName', TRUE),
      'aplicent_type' => $this->input->post('type', TRUE),
      'mas_economy_id' => $this->input->post('economy', TRUE),
      'aplicant_cat' => $this->input->post('category', TRUE),
      'sub_cat_mast_id' => $this->input->post('subCategory', TRUE),
      'product_name' => $this->input->post('projectName', TRUE),
      'reg_email' => $this->input->post('applicantEmail', TRUE),
      'aplicent_website' => $this->input->post('webSite', TRUE),
      'aplicent_profile' => $this->input->post('organization', TRUE),
      'aplicent_size' => $this->input->post('noEmployees', TRUE),
      'aplicent_date' => $this->input->post('date', TRUE),
      'aplicent_add1' => $this->input->post('address1', TRUE),
      'aplicent_add2' => $this->input->post('address2', TRUE),
      'aplicent_city' => $this->input->post('city', TRUE),
      'aplicent_state' => $this->input->post('province', TRUE),
      'aplicent_postal' => $this->input->post('zipCode', TRUE),
      'aplicent_con_fname' => $this->input->post('fullName', TRUE),
      'aplicent_con_lname' => $this->input->post('lastName', TRUE),
      'aplicent_con_desig' => $this->input->post('designation', TRUE),
      'aplicent_con_mobile' => $this->input->post('mobileNo', TRUE),
      'aplicent_con_telno' => $this->input->post('teleNo', TRUE),
      'aplicent_status' => 1
    );

    $data2 = $this->input->post('id', TRUE);

    $this->load->model('Form_model');

    $result = $this->Form_model->saveData($data1, $data2);

    if ($result) {
      echo  1;
    } else {
      echo  0;
    }
  }

  public function SaveImages()
  {
    ob_start();
    define('SITE_ROOT', realpath(dirname(__FILE__)));
    // echo SITE_ROOT;
    if (!empty($_FILES) && isset($_FILES['fileToUpload'])) {
      switch ($_FILES['fileToUpload']["error"]) {
        case UPLOAD_ERR_OK:
          $target = "./uploads/Files/";
          // $target = $target . basename($_FILES['fileToUpload']['name']);
          $extension = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
          $newname = $_POST['name'];

          if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target . $newname . "." . $extension)) {
            $status = "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded";
            $imageFileType = pathinfo($newname . '.' . $extension, PATHINFO_EXTENSION);
          } else {
            $status = "Sorry, there was a problem uploading your file.";
          }
          break;
      }

      echo "Status: {$status}<br/>\n";
    }
  }

  public function SaveDescription()
  {

    $id = $this->input->post('id', TRUE);
    $des = $this->input->post('des', TRUE);
    $label = $this->input->post('label', TRUE);

    $data = array(
      'aplicent_content_id' => '',
      'aplicent_id' => 0,
      'cat_mast_label_id' => $label,
      'aplicent_content_content' => $des,
      'aplicent_content_status' => 1
    );

    $this->load->model('Form_model');
    $result = $this->Form_model->insertDes($data, $id);

    if ($result) {

      echo 1;
    } else {

      echo 0;
    }
  }

  public function GetUserDes()
  {

    $id = $this->input->post('id', TRUE);
    $query = $this->db->query("SELECT a.aplicent_content_id, a.aplicent_content_content, c.cat_mast_label_name FROM aplicent_content a, cat_mast_label c WHERE a.cat_mast_label_id = c.cat_mast_label_id && a.aplicent_id = (SELECT `aplicent_id` FROM `aplicent_reg` WHERE aplicent_ref LIKE '%$id')");

    $json_data['data'] =  $query->result();
    echo json_encode($json_data);
  }

  public function GetImages()
  {

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

    if ($img1 == TRUE && $img2 == TRUE && $img3 == TRUE) {
      // $error = array('error' => $this->upload->display_errors());

      // $this->load->view('upload_form', $error);.
      echo "<script>alert('Succefully Images Uploaded')</script>";
    } else {
      // $data = array('upload_data' => $this->upload->data());

      // $this->load->view('upload_success', $data);
      echo "<script>alert('Upload Faliure')</script>";
    }
  }

  public function GetContent()
  {

    $contentID = $this->input->post('contentID', TRUE);

    $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE `aplicent_content_id` = ' . $contentID . '');

    echo json_encode($query->result());
  }

  public function UpdateDescription()
  {

    $contentID = $this->input->post('hiddenContentID', TRUE);
    $description = $this->input->post('des', TRUE);
    $label = $this->input->post('label', TRUE);


    $this->load->model('Form_model');
    $result = $this->Form_model->UpdateUser($contentID, $description, $label);

    //$query = $this->db->query('UPDATE `aplicent_content` SET `aplicent_content_content`='.$description.' WHERE `aplicent_content_id`= '.$contentID.'');

    if ($result) {

      echo 1;
    } else {

      echo 0;
    }
  }

  public function RemoveDescription()
  {

    $contentID = $this->input->post('contentID', TRUE);
    if ($this->db->query("DELETE FROM `aplicent_content` WHERE `aplicent_content_id` = $contentID")) {
      echo 1;
    } else {

      echo 0;
    }
  }

  public function CheckContent()
  {

    $id = $this->input->post('id', TRUE);

    if ($id == NULL) {
      $id = 0;
    }

    $this->load->model('Form_model');
    $result = $this->Form_model->CheckContentRows($id);


    echo $result;
    // if($result > 0){

    // }else{

    // }
    // echo '<script>alert('. $id .')</script>';

    // $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE `aplicent_content_id`'.$id.'');

    // echo '<script>alert('.$query->num_rows().')</script>';
  }

  public function GetEconomy()
  {

    $this->load->model('Form_model');

    $result = $this->Form_model->GetEconomyData();

    $json_data['dataEconomy'] = $result->result();
    echo json_encode($json_data);
  }

  public function GetCate()
  {

    $this->load->model('Form_model');

    $result = $this->Form_model->GetCateData();

    $json_data['dataCate'] = $result->result();
    echo json_encode($json_data);
  }


  public function GetSubCate()
  {

    $id = $this->input->post('id', TRUE);

    $this->load->model('Form_model');
    $result = $this->Form_model->GetSubCateData($id);

    $json_data['dataSubCate'] = $result->result();
    echo json_encode($json_data);
  }

  public function GetLabel()
  {

    $id = $this->input->post('id', TRUE);

    $this->load->model('Form_model');
    $result = $this->Form_model->GetLabelData($id);

    $json_data['dataLabel'] = $result->result();
    echo json_encode($json_data);
  }
}


/* End of file Form.php */
/* Location: ./application/controllers/Form.php */