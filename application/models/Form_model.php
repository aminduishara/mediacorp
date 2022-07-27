<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Form_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Form_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

  public function formData()
  {
    $lableData = $this->db->get('gen_mas_reglable');
    return $lableData;
  }

  public function InsertGeneralFormData($id,$type,$economy,$category,$subCategory,$projectName,$applicantEmail,$webSite,
  $organization,$noEmployees,$date,$address1,$address2,$city,$province,$zipCode,
  $fullName,$lastName,$designation,$mobileNo,$teleNo){

    $query1 = $this->db->query("INSERT INTO `aplicent_reg`(`aplicent_id`, `aplicant_nam`, `aplicent_type`, `mas_economy_id`, `aplicant_cat`, `sub_cat_mast_id`, `product_name`, `reg_email`, `aplicent_website`, `aplicent_profile`, `aplicent_size`, `aplicent_date`, `aplicent_add1`, `aplicent_add2`, `aplicent_city`, `aplicent_state`, `aplicent_postal`, `aplicent_con_fname`, `aplicent_con_lname`, `aplicent_con_desig`, `aplicent_con_mobile`, `aplicent_con_telno`) 
                      VALUES ($id, $fullName+$lastName, $type,$economy,$category,$subCategory,$projectName,$applicantEmail,$webSite, $organization,$noEmployees,$date,$address1,$address2,$city,$province,$zipCode, $fullName,$lastName,$designation,$mobileNo,$teleNo)");


    if($query1->num_rows() == 1){
      return TRUE;
    }
    else {
      return FALSE;
    }

  }
}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */