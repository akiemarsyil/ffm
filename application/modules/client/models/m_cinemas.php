<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cinemas extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//menampilkan semua bioskop
	public function get_cinema(){
		$sql = $this->db->get('cinemas');
		return $sql->result();
	}

	public function get_cinema_by_id($id){
		$this->db->where('idCinemas', $id);
		$sql = $this->db->get('cinemas');
		return $sql->result();
	}

	public function cinema($id){
		$this->db->select('idCinemas, name');
		$this->db->where('idCinemas', $id);
		$sql = $this->db->get('cinemas');
		return $sql->result();
	}
}
/* End of file m_cinemas.php */

/* Location: ./application/modules/client/models/m_cinemas.php */