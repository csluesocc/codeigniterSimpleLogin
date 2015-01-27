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

  /**
   * Get user data if email and password match
   * @param string $email user email
   * @param string $password user password
   * @return boolean|array false if email and password were invalid, array if all is ok
   */
  public function getUser($email, $password) {
    $where = array(
      'email' => $email
    );
    $this->db->select();
    $this->db->from('users');
    $this->db->where($where);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      $this->load->library('encrypt');
      $this->encrypt->set_cipher(MCRYPT_BLOWFISH);
      $user = $query->row_array();
      if($password == $this->encrypt->decode($user['password'])){
        return $user;
      }
    }
    return false;
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
