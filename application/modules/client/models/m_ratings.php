<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ratings extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//menampilkan rating
	public function get_rating(){
		$sql = $this->db->get('ratings', 3);
		return $sql->result();
	}

	public function insert_rating($param=''){
		$data = array( 'cinema_id'=> $param['id'],
						'comment' => $param['com'],
						'reputation' => $param['rate'],
						'by' => $param['by']);
		$sql = $this->db->insert('ratings',$data);
		return $this->db->affected_rows();
	}
}
/* End of file m_ratings.php */

/* Location: ./application/modules/client/models/m_ratings.php */