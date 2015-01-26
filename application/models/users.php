<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  /**
   * Creates a new user
   * @param array user data
   * @return boolean
   */
  public function newUser($userData) {
    $this->db->insert('users', $userData);
    return ($this->db->affected_rows()>0) ? true : false;
  }

  public function getUser($email, $password) {
    //
  }

  /**
   *Check if user already exists in database
   *
   *@param string $email user email
   *@return boolean
  */
  public function existsUser($email) {
    $this->db->select()->from('users')->where('email', $email);
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return TRUE;
    }else{
      return FALSE;
    }
  }

}
?>
