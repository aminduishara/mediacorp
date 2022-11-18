<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller UpdateLableCtrl
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

class Configuration extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('Configuration'); 
  }

  public function addLable() 
  {
    

    // $data1 = array(
    //   'date_time' => $this->input->post('datetime', TRUE),
    //   'aplicant_nam' => $this->input->post('fullName', TRUE) . ' ' . $this->input->post('lastName', TRUE),
    //   'aplicent_type' => $this->input->post('type', TRUE),
    //   'mas_economy_id' => $this->input->post('economy', TRUE),
    //   'aplicant_cat' => $this->input->post('category', TRUE),
    //   'sub_cat_mast_id' => $this->input->post('subCategory', TRUE),
    //   'product_name' => $this->input->post('projectName', TRUE),
    //   'reg_email' => $this->input->post('applicantEmail', TRUE),
    //   'aplicent_website' => $this->input->post('webSite', TRUE),
    //   'aplicent_profile' => $this->input->post('organization', TRUE),
    //   'aplicent_size' => $this->input->post('noEmployees', TRUE),
    //   'aplicent_date' => $this->input->post('date', TRUE),
    //   'aplicent_add1' => $this->input->post('address1', TRUE),
    //   'aplicent_add2' => $this->input->post('address2', TRUE),
    //   'aplicent_city' => $this->input->post('city', TRUE),
    //   'aplicent_state' => $this->input->post('province', TRUE),
    //   'aplicent_postal' => $this->input->post('zipCode', TRUE),
    //   'aplicent_con_fname' => $this->input->post('fullName', TRUE),
    //   'aplicent_con_lname' => $this->input->post('lastName', TRUE),
    //   'aplicent_con_desig' => $this->input->post('designation', TRUE),
    //   'aplicent_con_mobile' => $this->input->post('mobileNo', TRUE),
    //   'aplicent_con_telno' => $this->input->post('teleNo', TRUE),
    //   'aplicent_status' => 1,
    //   'evaluationsid' => 1
    // );

    // $data2 = $this->input->post('id', TRUE);

    // $this->load->model('Configuration_model');

    // $result = $this->Form_model->saveData($data1, $data2);

    // return $result;
    
  }

  public function getAllLables()
  {

    $this->load->model('Configuration_model');

    $result = $this->Lable_model->GetAllLables();

    $json_data['allLableData'] = $result->result();
    echo json_encode($json_data);
  }

  
  public function updateLable()
  {
    $mas_reglable_id = $this->input->post('mas_reglable_id', TRUE);
    $mas_reglable_text = $this->input->post('mas_reglable_text', TRUE);
    $mas_reglable_visibility = $this->input->post('mas_reglable_visibility', TRUE);
    $reqStatus = $this->input->post('reqStatus', TRUE);
    $mas_reglable_order = $this->input->post('mas_reglable_order', TRUE);


    $this->load->model('Configuration_model');
    $result = $this->Lable_model->updateLable($mas_reglable_id, $mas_reglable_text, $mas_reglable_visibility, $reqStatus,$mas_reglable_order);

    return json_encode($result);

  }



}


/* End of file UpdateLableCtrl.php */
/* Location: ./application/controllers/UpdateLableCtrl.php */