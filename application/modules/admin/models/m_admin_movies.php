<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_cinemas extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//menampilkan daftar film
	public function film(){
		$sql = $this->db->get('movies');
		return $sql->result();
	}
}
/* End of file m_admin_movies.php */

/* Location: ./application/modules/admin/models/m_admin_movies.php */