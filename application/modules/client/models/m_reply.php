<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_reply extends CI_Model {
	public function add($param=''){
		$data=array( 'id_forum' => $param['id_thread'],
					'id_user' => $param['user'],
					// 'categories' => $param['categories'],
					// 'image' => $param['img'],
					'reply' => $param['isi'],
					'rep_by' => $param['created_by'],
					'date' => $param['date']
					);
		$result=$this->db->insert('reply',$data);
		return $this->db->affected_rows();
	}
}
/* End of file m_reply.php */

/* Location: ./application/modules/client/models/m_reply.php */