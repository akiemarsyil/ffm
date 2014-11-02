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
}
/* End of file m_ratings.php */

/* Location: ./application/modules/client/models/m_ratings.php */