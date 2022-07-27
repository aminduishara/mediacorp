<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller ImageUpload
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

class ImageUpload extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

  public function do_Upload(){

    $config = array(
      'upload_path' => "./uploads/",
      'allowed_types' => "gif|jpg|png|jpeg|pdf",
      'overwrite' => TRUE,
      'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
      'max_height' => "768",
      'max_width' => "1024"
      );

      $this->load->library('upload', $config);

      if($this->upload->do_upload())
      {
        $data = array('upload_data' => $this->upload->data());
        //$this->load->view('upload_success',$data);
        //echo '<script>alert(`Successfully Uploaded`)</script>'
        $this->alert->set('alert-success', 'Successfully Uploaded');
      }
      else
      {
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('custom_view', $error);
        //echo '<script>alert(`Upload Faliure`)</script>';
        $this->alert->set('alert-faliure', 'Upload Fail');
      }

  }
}


/* End of file ImageUpload.php */
/* Location: ./application/controllers/ImageUpload.php */