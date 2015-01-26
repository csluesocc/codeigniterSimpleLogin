<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	/**
	 * Function for register a new user
	 */
  public function signup() {
		if($_POST) {
			$this->load->model('users'); //loading user model

			//check if user exists in db
			if(!$this->users->existsUser($_POST['email'])){
				/*
					encrypting password, see: https://ellislab.com/codeigniter/user-guide/libraries/encryption.html
					you need to install php5-mcrypt module.
					Debian base system:
					# apt-get install php5-mcrypt
				*/
				$this->load->library('encrypt');
				$this->encrypt->set_cipher(MCRYPT_BLOWFISH);
				$user = array(
					'email' => $_POST['email'],
					'password' => $this->encrypt->encode($_POST['password']),
					'name' => $_POST['username']
					);

				if($this->users->newUser($user)){
					echo json_encode(array("err" => FALSE, "msj" => "Successfully created user!"));
				}else{
					echo json_encode(array("err" => TRUE, "msj" => "There was problem creating user!"));
				}
			}else{//if user already exists
				echo json_encode(array("err" => TRUE, "msj" => "User already exists!"));
			}
		}
  }

	public function signin() {
		//
	}

  public function logout() {
		//
	}
}
?>
