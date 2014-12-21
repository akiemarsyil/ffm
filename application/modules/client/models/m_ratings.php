<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ratings extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//menampilkan rating
	public function get_rating($limit='',$offset=''){
		if(empty($limit)&&empty($offset)){
			$sql = $this->db->get('ratings');
		}else{
			$sql = $this->db->get('ratings',$limit,$offset);
		}
		return $sql->result();
	}

	public function count_comment()
	{
		$sql = $this->db->get('ratings');
		if($sql->num_rows>0){
			return $sql->row_array();
		}
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