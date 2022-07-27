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

    $id = $this->input->post('id', TRUE);
    $type = $this->input->post('type', TRUE);
    $economy = $this->input->post('economy', TRUE);
    $category = $this->input->post('category', TRUE);
    $subCategory = $this->input->post('subCategory', TRUE);
    $projectName = $this->input->post('projectName', TRUE);
    $applicantEmail = $this->input->post('applicantEmail', TRUE);
    $webSite = $this->input->post('webSite', TRUE);
    $organization = $this->input->post('organization', TRUE);
    $noEmployees = $this->input->post('noEmployees', TRUE);
    $date = $this->input->post('date', TRUE);
    $address1 = $this->input->post('address1', TRUE);
    $address2 = $this->input->post('address2', TRUE);
    $city = $this->input->post('city', TRUE);
    $province = $this->input->post('province', TRUE);
    $zipCode = $this->input->post('zipCode', TRUE);
    $fullName = $this->input->post('fullName', TRUE);
    $lastName = $this->input->post('lastName', TRUE);
    $designation = $this->input->post('designation', TRUE);
    $mobileNo = $this->input->post('mobileNo', TRUE);
    $teleNo = $this->input->post('teleNo', TRUE);

    // $this->form_validation->set_rules('economy_id', 'Economy', 'required');
    // $this->form_validation->set_rules('category', 'Category', 'required');
    // $this->form_validation->set_rules('sub_category', 'Sub Category', 'required');
    // $this->form_validation->set_rules('project_name', 'Project Name', 'required');
    // $this->form_validation->set_rules('applicant_email', 'Applicant Email', 'required');
    // $this->form_validation->set_rules('website_url', 'Web Site URL', 'required');
    // $this->form_validation->set_rules('organization', 'Organization', 'required');
    // $this->form_validation->set_rules('no_employees', 'No Employees', 'required');
    // $this->form_validation->set_rules('date', 'Registered Date', 'required');
    // $this->form_validation->set_rules('address_line1', 'Address Line 1', 'required');
    // $this->form_validation->set_rules('address_line2', 'Address Line 2 ', 'required');
    // $this->form_validation->set_rules('city', 'City', 'required');
    // $this->form_validation->set_rules('state', 'State', 'required');
    // $this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
    // $this->form_validation->set_rules('first_name', 'First Name', 'required');
    // $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    // $this->form_validation->set_rules('designation', 'Designation', 'required');
    // $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required');
    // $this->form_validation->set_rules('telephone_no', 'Telephone No', 'required');

    // if($this->form_validation->run() == FALSE)
    // {
    //   echo '<script>alert("Fill all the fields")</script>';

    // }
    // else
    // {
    //   $this->load->model("Form_model");
    //   $this->Committee_model->Update_Committee();
    //   //$this->CommitteeMembers();

    //   redirect(base_url() . "index.php/Committee/CommitteeMembers");
    //   // $this->load->model("Committee_model");
    //   // $data["fetch_CommitteeMember"] = $this->Committee_model->fetch_CommitteeMember();
    //   // $this->load->view("Manager/CommitteeMember", $data);

    // // }

    $this->load->model("Form_model");
    $result = $this->Form_model->InsertGeneralFormData($id,$type,$economy,$category,$subCategory,$projectName,$applicantEmail,$webSite,
    $organization,$noEmployees,$date,$address1,$address2,$city,$province,$zipCode,
    $fullName,$lastName,$designation,$mobileNo,$teleNo);

    if($result == TRUE){
      $this->alert->set('alert-success', 'Successfully Inserted');
    }else{
      $this->alert->set('alert-danger', 'Insertion Fail');
    }

  }

}


/* End of file Form.php */
/* Location: ./application/controllers/Form.php */