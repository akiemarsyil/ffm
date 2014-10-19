<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_movies extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//menampilkan daftar film
	public function get_film(){
		$sql = $this->db->get('movies');
		return $sql->result();
	}

	//menampilkan daftar film berdasar id
	public function get_film_by_id($id=''){
		$sql = $this->db->get_where('movies',array('idMovies'=>$id));
		return $sql->result();
	}
}
/* End of file m_admin_movies.php */

/* Location: ./application/modules/admin/models/m_admin_movies.php */