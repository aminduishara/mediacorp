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

  public function saveData($data) 
	{
		if($this->db->insert('aplicent_reg',$data))
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
  }

  public function insertDes($data)
  {
    if($this->db->insert('aplicent_content',$data))
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
  }

  public function GetDesData(){
    //$query = $this->db->get_where('aplicent_content', array('aplicent_content_id' => $userID));
    $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE aplicent_id = 5319');
    return $query;
  }

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */