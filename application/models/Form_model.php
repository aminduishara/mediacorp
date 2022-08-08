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

  public function saveData($data1, $data2) 
	{
    $insertQuery = $this->db->insert('aplicent_reg',$data1);
    $insert_id = (int)$this->db->insert_id();
    $refno = $insert_id.'-'.$data2;
    $query = $this->db->query("UPDATE `aplicent_reg` SET `aplicent_ref` ='$refno', `aplicent_refno` = '$insert_id' WHERE `aplicent_id` = '$insert_id'");

    $data =  array(
      'aplicent_id'=>$insert_id,
      'insertQuery'=>$insertQuery,
      'updatequery'=> $query,
      'refno'=>$refno 
    );

		echo json_encode($data);
  }

  public function insertDes($data)
  {
    $query = $this->db->insert('aplicent_content', $data);
    echo json_encode($query);

  }

  // public function GetDesData(){
  //   //$query = $this->db->get_where('aplicent_content', array('aplicent_content_id' => $userID));
  //   $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE aplicent_id = 5319');
  //   return $query;
  // }

  public function UpdateUserDes($contentID, $description, $label){
    
    $query = $this->db->query("UPDATE `aplicent_content` SET `cat_mast_label_id`= $label, `aplicent_content_content`='$description' WHERE `aplicent_content_id` = $contentID");

    echo json_encode($query);

  }

  public function CheckContentRows($id){
    $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE `aplicent_content_id` = '.$id.'');
    return $query->num_rows();
  }

  public function GetEconomyData(){

    $query = $this->db->query('SELECT * FROM `gen_mas_economy` WHERE `mas_economy_status` = 1');
    return $query;


  }

  public function GetCateData(){

    $query = $this->db->query('SELECT * FROM `cat_mast` WHERE `freeze_status` = "unfreezed"');
    return $query;


  }

  public function GetSubCateData($id){

    $query = $this->db->query('SELECT * FROM `sub_cat_mast` WHERE `cat_id` = '.$id.'');
    return $query;

  }
  
  public function GetLabelData($id){

    $query = $this->db->query('SELECT * FROM `cat_mast_label` WHERE `cat_id` = '.$id.'');
    return $query;

  }

  public function SaveImagesDB($img1, $img2, $img3, $aplicentID){

    $id = (int)$aplicentID;
    $result = $this->db->query("UPDATE `aplicent_reg` SET `aplicent_image` = '$img1',`aplicent_image2` = '$img2',`aplicent_image3` = '$img3' WHERE `aplicent_id` = $id");
    return $result;

  }

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */