<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_schedules extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
		//menampilkan daftar ticket
	public function get_jadwal(){
		$sql = $this->db->get('schedule');
		return $sql->result();
	}
}
/* End of file m_admin_schedules.php */

/* Location: ./application/modules/admin/models/m_admin_schedules.php */