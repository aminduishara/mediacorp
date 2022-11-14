<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

class Form_model extends CI_Model
{

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
    $insertQuery = $this->db->insert('aplicent_reg', $data1);
    $insert_id = (int)$this->db->insert_id();
    $refno = $insert_id . '-' . $data2;
    $query = $this->db->query("UPDATE `aplicent_reg` SET `aplicent_ref` ='$refno', `aplicent_refno` = '$insert_id' WHERE `aplicent_id` = '$insert_id'");

    $data =  array(
      'aplicent_id' => $insert_id,
      'insertQuery' => $insertQuery,
      'updatequery' => $query,
      'refno' => $refno
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

  public function UpdateUserDes($contentID, $description, $label)
  {

    $query = $this->db->query("UPDATE `aplicent_content` SET `cat_mast_label_id`= $label, `aplicent_content_content`='$description' WHERE `aplicent_content_id` = $contentID");

    echo json_encode($query);
  }

  public function CheckContentRows($id)
  {
    $query = $this->db->query('SELECT * FROM `aplicent_content` WHERE `aplicent_content_id` = ' . $id . '');
    return $query->num_rows();
  }

  public function GetEconomyData()
  {

    $query = $this->db->query('SELECT gen_mas_economy.mas_economy_id, mas_economy_name, evaluations_mast.mas_economy_id as defaulteconomy FROM `gen_mas_economy` INNER JOIN evaluations_mast ON evaluations_id = 1 WHERE `mas_economy_status` = 1');
    return $query;
  }

  public function GetCateData($id)
  {

    $query = $this->db->query("SELECT * FROM `cat_mast` WHERE `freeze_status` = 'unfreezed' AND cat_type = $id");
    return $query;
  }

  public function GetSubCateData($id)
  {

    $query = $this->db->query('SELECT * FROM `sub_cat_mast` WHERE `cat_id` = ' . $id . '');
    return $query;
  }

  public function GetLabelData($id, $aplicant_id = -1)
  {

    $sql = "SELECT cat_mast_label.cat_mast_label_id, cat_mast_label.cat_id,cat_mast_label.cat_mast_label_name,cat_mast_label.cat_mast_label_conlength,cat_mast_label.cat_mast_label_Instruction, aplicent_content.aplicent_id
    FROM `cat_mast_label` 
    LEFT JOIN aplicent_content ON cat_mast_label.cat_mast_label_id = aplicent_content.cat_mast_label_id AND aplicent_content.aplicent_id = $aplicant_id
    WHERE `cat_id` = $id";

    // $sql = "SELECT *
    //         FROM `cat_mast_label` 
    //         LEFT JOIN aplicent_content ON cat_mast_label.cat_mast_label_id = aplicent_content.cat_mast_label_id AND aplicent_content.aplicent_id = $aplicant_id";

    // if($aplicant_id != -1){
    //   $sql .= " AND aplicent_content.aplicent_id = $aplicant_id";
    // }

    // $sql .= " WHERE `cat_id` = $id";
    // $sql .= " GROUP BY cat_mast_label.cat_mast_label_id";
    $query = $this->db->query($sql);
    return $query;
  }

  public function SaveImagesDB($img1, $img2, $img3, $aplicentID)
  {

    $id = (int)$aplicentID;
    $result = $this->db->query("UPDATE `aplicent_reg` SET `aplicent_image` = '$img1',`aplicent_image2` = '$img2',`aplicent_image3` = '$img3' WHERE `aplicent_id` = $id");
    return $result;
  }

  public function updateData($data1, $aplicent_id)
  {

    $this->db->where('aplicent_id', $aplicent_id);
    $query = $this->db->update('aplicent_reg', $data1);

    $data =  array(
      'updatequery' => $query
    );

    echo json_encode($data);
  }

  public function GetLabelWordCount($selectedLabel)
  {
    $sql = "SELECT cat_mast_label_conlength, cat_mast_label_Instruction FROM cat_mast_label WHERE cat_mast_label_id = $selectedLabel";

    $query = $this->db->query($sql);
    return $query;
  }




  public function GetUploadType()
  { // new-line
    $sql = "SELECT * FROM gen_mas_uploadtype";
    $query = $this->db->query($sql);
    return $query;
  }

  public function GetAplicentUpload($aplicentID)
  { // new-line
    $sql = "SELECT aplicent_upload_id, aplicent_id, aplicent_upload_name, aplicent_upload_status, aplicent_upload_remarks, mas_uploadtype_des FROM aplicent_upload INNER JOIN gen_mas_uploadtype ON aplicent_upload.mas_uploadtype_id = gen_mas_uploadtype.mas_uploadtype_id WHERE aplicent_id = $aplicentID";
    $query = $this->db->query($sql);
    return $query;
  }

  public function saveAplicentUpload($data)
  {
    $query = $this->db->insert('aplicent_upload', $data);
    return $query;
  }

  public function deleteAplicentUpload($id)
  {
    $this->db->where('aplicent_upload_id', $id);
    $this->db->delete('aplicent_upload');
    return 1;
  }

  public function getParameters()
  {
    $query = $this->db->get('gen_mas_companypara');
    return $query->row();
  }

  public function getEvaluation()
  {
    $query = $this->db->get('evaluations_mast')->where('evaluations_id', 1);
    return $query->row();
  }

  public function saveVideoLink($data)
  {
    $query = $this->db->insert('aplicent_videolinks', $data);
    return 1;
  }

  public function getVideoLink($id)
  {
    $query = $this->db->query("SELECT * FROM aplicent_videolinks WHERE aplicent_id = '$id' ORDER BY videolink_id DESC");
    return $query;
  }

  public function updateVideoLink($data, $id)
  {
    $this->db->where('videolink_id', $id);
    $query = $this->db->update('aplicent_videolinks', $data);
    return $query;
  }

  public function removeVideos($id)
  {
    $this->db->where('videolink_id', $id);
    $this->db->delete('aplicent_videolinks');
    return 1;
  }
}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */