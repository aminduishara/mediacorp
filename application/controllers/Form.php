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
    date_default_timezone_set('Asia/Colombo');
  }

  public function index()
  {
    // 
  }


  public function SaveFormData()
  {

    $data1 = array(
      'date_time' => date('Y-m-d H:i:s'),
      'aplicant_nam' => $this->input->post('fullName', TRUE),
      'aplicent_type' => $this->input->post('type', TRUE),
      'aplicent_date' => $this->input->post('aplicent_date', TRUE),
      'mas_economy_id' => 1,
      'aplicant_cat' => $this->input->post('category', TRUE),
      'sub_cat_mast_id' => $this->input->post('category', TRUE),
      'product_name' => $this->input->post('projectName', TRUE),
      'reg_email' => $this->input->post('applicantEmail', TRUE),
      'aplicent_profile' => $this->input->post('organization', TRUE),
      'aplicent_add1' => $this->input->post('address1', TRUE),
      'aplicent_add2' => $this->input->post('address2', TRUE),
      'aplicent_postal' => $this->input->post('zipCode', TRUE),
      'aplicent_con_fname' => $this->input->post('fullName', TRUE),
      'aplicent_con_lname' => $this->input->post('lastName', TRUE),
      'aplicent_con_desig' => $this->input->post('designation', TRUE),
      'aplicent_con_mobile' => $this->input->post('mobileNo', TRUE),
      'aplicent_con_telno' => $this->input->post('teleNo', TRUE),
      'aplicent_status' => 1,
      'evaluationsid' => 1
    );

    $data2 = $this->input->post('id', TRUE);

    $this->load->model('Form_model');

    $result = $this->Form_model->saveData($data1, $data2);

    return $result;
  }

  public function UpdateAplicentData()
  {

    $data1 = array(
      'aplicant_nam' => $this->input->post('fullName', TRUE),
      'aplicent_type' => $this->input->post('type', TRUE),
      'aplicent_date' => $this->input->post('aplicent_date', TRUE),
      'mas_economy_id' => 1,
      'aplicant_cat' => $this->input->post('category', TRUE),
      'sub_cat_mast_id' => $this->input->post('category', TRUE),
      'product_name' => $this->input->post('projectName', TRUE),
      'reg_email' => $this->input->post('applicantEmail', TRUE),
      'aplicent_profile' => $this->input->post('organization', TRUE),
      'aplicent_add1' => $this->input->post('address1', TRUE),
      'aplicent_add2' => $this->input->post('address2', TRUE),
      'aplicent_postal' => $this->input->post('zipCode', TRUE),
      'aplicent_con_fname' => $this->input->post('fullName', TRUE),
      'aplicent_con_lname' => $this->input->post('lastName', TRUE),
      'aplicent_con_desig' => $this->input->post('designation', TRUE),
      'aplicent_con_mobile' => $this->input->post('mobileNo', TRUE),
      'aplicent_con_telno' => $this->input->post('teleNo', TRUE),
      'aplicent_status' => 1,
      'evaluationsid' => 1
    );

    $aplicent_id = $this->input->post('aplicent_id', TRUE);

    $this->load->model('Form_model');

    $result = $this->Form_model->updateData($data1, $aplicent_id);

    return $result;
  }

  public function SaveImages()
  {
    ob_start();
    define('SITE_ROOT', realpath(dirname(__FILE__)));
    // echo SITE_ROOT;
    if (!empty($_FILES) && isset($_FILES['fileToUpload'])) {
      switch ($_FILES['fileToUpload']["error"]) {
        case UPLOAD_ERR_OK:
          $target = "./uploads/";
          // $target = $target . basename($_FILES['fileToUpload']['name']);
          $extension = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
          $newname = $_POST['name'];

          if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target . $newname)) {
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

    $des = $this->input->post('des', TRUE);
    $label = $this->input->post('label', TRUE);
    $aplicentID = $this->input->post('aplicentID', TRUE);

    $data = array(
      'aplicent_content_id' => '',
      'aplicent_id' => (int)$aplicentID,
      'cat_mast_label_id' => $label,
      'aplicent_content_content' => $des,
      'aplicent_content_status' => 1
    );

    $this->load->model('Form_model');
    $result = $this->Form_model->insertDes($data);

    return $result;
  }

  public function GetUserDes()
  {

    $id = $this->input->post('id', TRUE);
    $query = $this->db->query("SELECT a.aplicent_content_id, a.aplicent_content_content, c.cat_mast_label_id, c.cat_mast_label_name FROM aplicent_content a, cat_mast_label c WHERE a.cat_mast_label_id = c.cat_mast_label_id && a.aplicent_id = (SELECT `aplicent_id` FROM `aplicent_reg` WHERE aplicent_ref LIKE '%$id')");

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
    $query1 = $this->db->query("SELECT cat_mast_label.cat_mast_label_name FROM cat_mast_label WHERE cat_mast_label.cat_mast_label_id = (SELECT cat_mast_label_id FROM `aplicent_content` WHERE `aplicent_content_id` = $contentID)");

    $data = array(
      'data1' => $query->result(),
      'data2' => $query1->result()
    );

    echo json_encode($data);
  }

  public function UpdateDescription()
  {

    $contentID = $this->input->post('hiddenContentID', TRUE);
    $description = $this->input->post('des', TRUE);
    $label = $this->input->post('label', TRUE);


    $this->load->model('Form_model');
    $result = $this->Form_model->UpdateUserDes($contentID, $description, $label);

    return $result;
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

    $result = $this->Form_model->GetCateData($_POST['id']);

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
    $aplicant_id = $this->input->post('aplicant_id', TRUE);

    $this->load->model('Form_model');
    $result = $this->Form_model->GetLabelData($id, $aplicant_id);

    $json_data['dataLabel'] = $result->result();
    echo json_encode($json_data);
  }

  public function SaveImagesToDB()
  {
    $img1 = $this->input->post('img1', TRUE);
    $img2 = $this->input->post('img2', TRUE);
    $img3 = $this->input->post('img3', TRUE);
    $aplicentID = $this->input->post('aplicentID', TRUE);

    $this->load->model('Form_model');

    $result = $this->Form_model->SaveImagesDB($img1, $img2, $img3, $aplicentID);

    echo json_encode($result);
  }

  public function GetWordCount()
  {
    $selectedLabel = $this->input->post('selectedLabel', TRUE);

    $this->load->model('Form_model');
    $result = $this->Form_model->GetLabelWordCount($selectedLabel);

    $json_data['wordCount'] = $result->result();
    echo json_encode($json_data);
  }




  public function getUploadTypes()
  {
    $this->load->model('Form_model');

    $result1 = $this->Form_model->GetUploadType();
    $data['uploadTypes'] = $result1->result();
    echo json_encode($data);
  }

  public function getUploadData()
  {
    $this->load->model('Form_model');

    $result1 = $this->Form_model->GetUploadType();
    $data['uploadTypes'] = $result1->result();

    $result2 = $this->Form_model->GetAplicentUpload($_POST['aplicentID']);
    $data['uploadFiles'] = $result2->result();

    echo json_encode($data);
  }

  public function saveAplicentUpload()
  {
    ob_start();
    define('SITE_ROOT', realpath(dirname(__FILE__)));
    // echo SITE_ROOT;
    if (!empty($_FILES) && isset($_FILES['fileToUpload'])) {
      $pdfFile = $_FILES['fileToUpload']['name'];
      switch ($_FILES['fileToUpload']["error"]) {
        case UPLOAD_ERR_OK:
          $target = "./uploads/";
          // $target = $target . basename($_FILES['fileToUpload']['name']);
          $extension = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
          $newname = $pdfFile;

          if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target . $newname)) {
            $status = "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded";
            $imageFileType = pathinfo($newname . '.' . $extension, PATHINFO_EXTENSION);
          } else {
            $status = "Sorry, there was a problem uploading your file.";
          }
          break;
      }
    }

    $this->load->model('Form_model');
    $insData = array(
      'aplicent_id' => $_POST['aplicentID'],
      'aplicent_upload_name' => $pdfFile,
      'aplicent_upload_status' => 1,
      'aplicent_upload_remarks' => '',
      'mas_uploadtype_id' => $_POST['typeID']
    );
    $this->Form_model->saveAplicentUpload($insData);

    $result2 = $this->Form_model->GetAplicentUpload($_POST['aplicentID']);
    $data['uploadFiles'] = $result2->result();
    echo json_encode($data);
  }

  public function removeAplicentUpload()
  {
    $this->load->model('Form_model');
    $this->Form_model->deleteAplicentUpload($_POST['id']);
    echo json_encode(1);
  }

  function saveVideos()
  {
    $this->load->model('Form_model');
    $insData = array(
      'aplicent_id' => $_POST['aplicentID'],
      'videolink_type ' => $_POST['type'],
      'videolink_youtube' => $_POST['type'] == 1 ? 2 : 1,
      'videolink_url' => $_POST['text'],
      'videolink_createdby' => $_POST['aplicentID'],
      'videolink_createddate' => date('Y-m-d H:i:s')
    );
    $this->Form_model->saveVideoLink($insData);
    $data = $this->Form_model->getVideoLink($_POST['aplicentID']);
    $d['data'] = $data->result();
    echo json_encode($d);
  }

  function updateVideos()
  {
    $this->load->model('Form_model');
    $insData = array(
      'videolink_type ' => $_POST['type'],
      'videolink_youtube' => $_POST['type'] == 1 ? 2 : 1,
      'videolink_url' => $_POST['text'],
      'videolink_updatedby' => $_POST['aplicentID'],
      'videolink_updateddate' => date('Y-m-d H:i:s')
    );
    $this->Form_model->updateVideoLink($insData, $_POST['id']);
    $data = $this->Form_model->getVideoLink($_POST['aplicentID']);
    $d['data'] = $data->result();
    echo json_encode($d);
  }

  function removeVideos()
  {
    $this->load->model('Form_model');
    $this->Form_model->removeVideos($_POST['id']);
    $data = $this->Form_model->getVideoLink($_POST['aplicentID']);
    $d['data'] = $data->result();
    echo json_encode($d);
  }

  function GetTerms()
  {
    $this->load->model('Form_model');
    $data = $this->Form_model->GetTerms($_POST['id']);
    echo json_encode($data->row());
  }

  function checkrequiredLabel()
  {
    $this->load->model('Form_model');
    $data = $this->Form_model->checkrequiredLabel($_POST['id']);
    echo json_encode($data->result());
  }




  public function getAplicentData() // new-line
  {
    $refNo = $this->input->post('refNo', TRUE);
    $email = $this->input->post('emailAddress', TRUE);

    $this->load->model('Form_model');
    $data = $this->Form_model->getAplicentData($refNo, $email);
    echo json_encode($data);
  }

  // public function SaveFormData()
  // {

  //   $data1 = array(
  //     'date_time' => date('Y-m-d H:i:s'),
  //     'aplicant_nam' => $this->input->post('fullName', TRUE),
  //     'aplicent_type' => $this->input->post('type', TRUE),
  //     'aplicent_date' => $this->input->post('aplicent_date', TRUE),
  //     'mas_economy_id' => 1,
  //     'aplicant_cat' => $this->input->post('category', TRUE),
  //     'sub_cat_mast_id' => $this->input->post('category', TRUE),
  //     'product_name' => $this->input->post('projectName', TRUE),
  //     'reg_email' => $this->input->post('applicantEmail', TRUE),
  //     'aplicent_profile' => $this->input->post('organization', TRUE),
  //     'aplicent_add1' => $this->input->post('address1', TRUE),
  //     'aplicent_add2' => $this->input->post('address2', TRUE),
  //     'aplicent_postal' => $this->input->post('zipCode', TRUE),
  //     'aplicent_con_fname' => $this->input->post('fullName', TRUE),
  //     'aplicent_con_lname' => $this->input->post('lastName', TRUE),
  //     'aplicent_con_desig' => $this->input->post('designation', TRUE),
  //     'aplicent_con_mobile' => $this->input->post('mobileNo', TRUE),
  //     'aplicent_con_telno' => $this->input->post('teleNo', TRUE),
  //     'aplicent_status' => 1,
  //     'evaluationsid' => 1
  //   );

  //   $data2 = $this->input->post('id', TRUE);

  //   $this->load->model('Form_model');

  //   $result = $this->Form_model->saveData($data1, $data2);

  //   return $result;
  // }

}


/* End of file Form.php */
/* Location: ./application/controllers/Form.php */