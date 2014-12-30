<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_complains extends CI_Model {
	public function complain_thread($param='')
	{
		$data = array('idForums'=> $param['thread_id'],
						'message'=>$param['pesan'],
						'com_by'=>$param['uname']);
		$result=$this->db->insert('complains',$data);
		return $this->db->affected_rows();
	}
}
/* End of file m_complains.php */

/* Location: ./application/modules/client/models/m_complains.php */