<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Lable_model
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

class Configuration_model extends CI_Model {

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

  public function AddLable($insData)
  {
    // 
    $query = $this->db->insert('gen_mas_reglable', $insData);
    echo json_encode($query);
  }

  
  public function GetLables($insData)
  {
    // 
    $query = $this->db->insert('gen_mas_reglable', $insData);
    echo json_encode($query);
  }

  public function GetAllLables()
  {    
    $query = $this->db->query('SELECT * FROM `gen_mas_reglable`');
    return $query;
  }

  public function GetAllTypes()
  {    
    $query = $this->db->query('SELECT * FROM `gen_mas_aplicanttype`');
    return $query;
  }

  public function GetAllInputTypes()
  {    
    $query = $this->db->query('SELECT * FROM `gen_mas_inputtype`');
    return $query;
  }

  public function GetInputTypes($id)
  {    
    $query = $this->db->query("SELECT * FROM `gen_mas_inputtype` WHERE `mas_inputtype_id`= $id");
    return $query;
  }

  public function updateLable($mas_reglable_id, $mas_reglable_text, $mas_reglable_visibility, $mas_reglable_required, $mas_reglable_order, $mas_reglable_type, $mas_reglable_code)
  {    

    $sqlquery = "UPDATE `gen_mas_reglable` SET `mas_reglable_text`= '$mas_reglable_text', `mas_reglable_visibility`=$mas_reglable_visibility, `mas_reglable_required`=$mas_reglable_required, `mas_reglable_order`= $mas_reglable_order, `mas_reglable_type`= $mas_reglable_type, `mas_reglable_code`= '$mas_reglable_code' WHERE `mas_reglable_id`= $mas_reglable_id";
    $query = $this->db->query($sqlquery);

    echo json_encode($query);
  }

}

/* End of file Lable_model.php */
/* Location: ./application/models/Lable_model.php */