<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Host_controller extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
 public function __construct()
 {
   parent::__construct() ;
   $this->load->model('Host_model') ;
 }
	public function add_listing()
	{
		$this->load->helper('url');
		$data['page'] = 'host/add_listing' ;
		$this->load->view('menu/content',$data);
	}
	public function get_listing()
	{
		$data['page'] = 'host/get_listing' ;
		$this->load->view('menu/content',$data) ;
	}
	public function delete_listing()
	{
		$data['page'] = 'host/delete_listing' ;
		$this->load->view('menu/content',$data) ;
	}
	public function get_edit_listing()
	{
		$data['page'] = 'host/edit_listing' ;
		$this->load->view('menu/content',$data) ;
	}
	// public function update_listing($carID)
	// {
	// 	$data['carID'] =$carID ;
	// 	$data['id_get_edit'] = $this->Host_model->get_carID($carID) ;
	// 	$data['page'] = 'host/edit_listing' ;
	// 	$this->load->view('menu/content',$data) ;
	// }
	public function listing_detail()
	{
		$data['page'] = 'host/listing_detail' ;
		$this->load->view('menu/content',$data) ;
	}
	public function edit_listing()
	{
	  $config['upload_path'] ='./cover_gallery/' ;
	  $config['allowed_types'] = 'jpg|jpeg|png|gif' ;
	  $config['file_name'] = $_FILES['cover_photo_update']['name'] ;

	  //Load upliad library and initialize configuration
	  $this->load->library('upload',$config) ;
	  $this->upload->initialize($config) ;
	  $this->upload->do_upload('cover_photo_update') ;
	  $data_upload_file = $this->upload-> data() ;
	  $image = $data_upload_file['file_name'] ;
	  $update_id = $this->input->post('carID') ;
	  if(!empty($image))
	  {
	    $update_data = array(
	      'title' => $this->input->post('title') ,
	      'description' => $this->input->post('description') ,
	      'cover_photo' => $image ,
	      'type_of_car' => $this->input->post('type_of_car') ,
	      'year' => $this->input->post('year') ,
	      'cancellation_policy' => $this->input->post('cancellation_policy')

	    ) ;
	  }
	  else {
	    $update_data = array(
	      'title' => $this->input->post('title') ,
	      'description' => $this->input->post('description') ,
	      'type_of_car' => $this->input->post('type_of_car') ,
	      'year' => $this->input->post('year') ,
	      'cancellation_policy' => $this->input->post('cancellation_policy')

	    ) ;
	  }
	  $success_1 = $this->Host_model->get_update($update_id,$update_data) ;
	  $number_of_files = sizeof($_FILES['other_photo']['name']) ;
	  $files = $_FILES['other_photo'] ;
	  $config['upload_path'] = './other_gallery/' ;
	  $config['allowed_types'] = 'jpg|jpeg|png|gif' ;
	  $config['max_size']   = 1000000000;
	  $config['max_width']  = 1024000;
	  $config['max_height'] = 768000;
	  for ($i = 0 ; $i < $number_of_files ; $i ++)
	  {
	    $_FILES['other_photo']['name'] =$files['name'][$i] ;
	    $_FILES['other_photo']['type'] =$files['type'][$i] ;
	    $_FILES['other_photo']['tmp_name'] =$files['tmp_name'][$i] ;
	    $_FILES['other_photo']['error'] =$files['error'][$i] ;
	    $_FILES['other_photo']['size'] =$files['size'][$i] ;
	    $this->upload->initialize($config) ;
	    $this->upload->do_upload('other_photo') ;
	    $data = $this->upload->data() ;
	    $update_images[$i]['photo'] = $data['file_name'] ;

	  }
	  $carID = $update_id ;
	  $this->Host_model->get_delete_images($carID) ;
	  $images_list=array_map( function($addID) use ($update_id)
	  {
	    $addID['carID']=$update_id ;
	    return $addID ;
	  },$update_images) ;
	  $success_2 = $this->Host_model->add_photo($images_list) ;
	  if($success_1 && $success_2)
	  {
	    $data['message'] = 'Data has been updated.' ;
	  }
	  else {
	    $data['message'] = 'Error.' ;
	  }
	  $data['page'] = 'host/message' ;
	  $this->load->view('menu_content/content',$data) ;


}

}
