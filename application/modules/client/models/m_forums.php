<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_forums extends CI_Model {
	//menginputkan data registrasi
	public function add($param=''){
		$data=array( 'users' => $param['user'],
					'title' => $param['title'],
					'categories' => $param['cat'],
					'content' => $param['isi'],
					'created_by' => $param['created'],
					'date' => $param['created']
					);
		$result=$this->db->insert('forums',$data);
		return $this->db->affected_rows();
	}
}
/* End of file m_cforums.php */

/* Location: ./application/modules/client/models/m_cforums.php */