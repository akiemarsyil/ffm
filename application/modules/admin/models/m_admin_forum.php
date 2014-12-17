<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_forum extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function get_forum()
	{
		$sql = $this->db->get('forums');
		return $sql->result();
	}
}
/* End of file m_admin_forum.php */

/* Location: ./application/modules/admin/models/m_admin_forum.php */