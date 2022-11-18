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

    // $result = $this->Configuration_model->saveData($data1, $data2);

    // return $result;
    
  }

  public function getAllLables()
  {

    $this->load->model('Configuration_model');

    $result = $this->Configuration_model->GetAllLables();

    $json_data['allLableData'] = $result->result();
    echo json_encode($json_data);
  }

  
  public function updateLable()
  {
    $mas_reglable_id = $this->input->post('mas_reglable_id', TRUE);
    $mas_reglable_text = $this->input->post('mas_reglable_text', TRUE);
    $mas_reglable_visibility = $this->input->post('mas_reglable_visibility', TRUE);
    $mas_reglable_required = $this->input->post('mas_reglable_required', TRUE);    
    $mas_reglable_order = $this->input->post('mas_reglable_order', TRUE);    
    $mas_reglable_type = $this->input->post('mas_reglable_type', TRUE);    
    $mas_reglable_code = $this->input->post('mas_reglable_code', FALSE);


    // print_r($mas_reglable_id);
    // print_r($mas_reglable_text);
    // print_r($mas_reglable_visibility);
    // print_r($mas_reglable_required);
    // print_r($mas_reglable_order);
    // print_r($mas_reglable_type);
    // print_r($mas_reglable_code);
    $this->load->model('Configuration_model');
    $result = $this->Configuration_model->updateLable($mas_reglable_id, $mas_reglable_text, $mas_reglable_visibility, $mas_reglable_required, $mas_reglable_order, $mas_reglable_type, $mas_reglable_code);

    return json_encode($result);

  }

  public function getAllTypes()
  {

    $this->load->model('Configuration_model');

    $result = $this->Configuration_model->GetAllTypes();

    $json_data['allTypeData'] = $result->result();
    echo json_encode($json_data);
  }

  public function getAllInputTypes()
  {

    $this->load->model('Configuration_model');

    $result = $this->Configuration_model->GetAllInputTypes();

    $json_data['allInputTypesData'] = $result->result();
    echo json_encode($json_data);
  }

  public function getInputTypes()
  {

     
    $mas_inputtype_id = $this->input->post('mas_inputtype_id', TRUE);

    $this->load->model('Configuration_model');

    $result = $this->Configuration_model->GetInputTypes($mas_inputtype_id);

    $json_data['InputTypesData'] = $result->result();
    echo json_encode($json_data);
  }

}


/* End of file UpdateLableCtrl.php */
/* Location: ./application/controllers/UpdateLableCtrl.php */