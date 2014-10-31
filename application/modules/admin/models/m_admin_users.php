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

	//menampilkan user
	public function get_user(){
		$this->db->where('level', '0');
		$sql = $this->db->get('users');
		return $sql->result();
	}

	//menampilkan user berdasar id
	public function get_user_by_id($id=''){
		$this->db->where('idUser', $id);
		$this->db->where('level', '0');
		$sql = $this->db->get('users');
		return $sql->result();
	}

	//update data user
	public function update_user($param=''){
		$data=array( 'isAktif' => $param['stat'],
					'level' => $param['lvl']
					);
		$this->db->where('idUser',$param['id']);
		$sql = $this->db->update('users', $data);
		return $this->db->affected_rows();
	}
}
/* End of file m_admin_users.php */

/* Location: ./application/modules/admin/models/m_admin_users.php */