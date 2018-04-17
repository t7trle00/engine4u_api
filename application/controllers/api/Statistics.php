<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

class Statistics extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('User_model');
    }
    public function names_get()
    {
        // Users from a data store e.g. database
        $names=$this->User_model->get_names_freq();

                if ($names)
                {
                    // Set the response and exit
                    $this->response($names, REST_Controller::HTTP_OK);
                }
    }
    public function average_get()
    {
      $ages=$this->User_model->get_avg_age() ;
      if($ages)
      {
        $this->response($ages, REST_Controller::HTTP_OK) ;
      }
      else {
        $this->response('ERROR', REST_Controller::HTTP_NOT_FOUND) ;
      }
    }
  }
