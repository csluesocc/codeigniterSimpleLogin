<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('home');
  }

  public function admin() {
    $this->load->view('admin');
  }
}
