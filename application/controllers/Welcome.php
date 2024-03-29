<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->model("Form_model");
		$data["lableData"] = $this->Form_model->formData();
		$data["para"] = $this->Form_model->getParameters();
		// $data["evaluation"] = $this->Form_model->getEvaluation();
		$this->load->view('homeImpl', $data);
		//$this->load->view('Sample');
		// $this->load->model("Form_model");
		// $data["lableData"] = $this->Form_model->formData();
		// $this->load->view('homeImpl', $data);   
		//$this->load->view('upload_form', array('error' => ' ' ));

	}

	public function LoadForm()
	{
		//$this->load->view('Sample');
		$this->load->model("Form_model");
		$data["lableData"] = $this->Form_model->formData();
		$this->load->view('homeImpl', $data);
		//$this->load->view('upload_form', array('error' => ' ' ));

	}
}
