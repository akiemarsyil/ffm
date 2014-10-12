<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_users extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//mengecek apakah yang login admin atau bukan
	public function cek_admin($param=''){
		$query = $this->db->get_where('users', array('level' => $param));
		$result = $query->result();
		return $result;
	}
}
/* End of file m_admin_users.php */

/* Location: ./application/modules/admin/models/m_admin_users.php */