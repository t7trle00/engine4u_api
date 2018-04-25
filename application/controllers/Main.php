<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function __construct()
  {
    parent::__construct() ;
    $this->load->model('Host_model') ;
  }
  public function index()
	{
		$this->load->helper('url');
		$this->load->view('first_page');
	}

  public function main_page(){
    // $data['carID'] = $carID ;
    $data['dataImage'] = $this->Host_model->get_cover_photo() ;
    $data['page']='main/main_pages';
    $this->load->view('menu/content',$data);

  }
  public function intruction(){
    $data['page']='main/intruction';
    $this->load->view('menu/content',$data);
  }
  public function CoverPhotoShow()
  {

    $this->load->view('menu/content',$data) ;
  }
  public function contact_us()
  {
    $data['page'] = 'main/contact_us' ;
    $this->load->view('menu/content',$data) ;
  }
  public function term_of_use()
  {
    $data['page'] = 'main/term_of_use' ;
    $this->load->view('menu/content',$data) ;
  }
  public function privacy_policy()
  {
    $data['page'] = 'main/privacy_policy' ;
    $this->load->view('menu/content',$data) ;
  }


}
