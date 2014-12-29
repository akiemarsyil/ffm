<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_forums extends CI_Model {
	//menampilkan semua forum
	public function get_forum($limit='',$offset='')
	{
		if(empty($limit)&&empty($offset)){
			$sql = $this->db->get('view_forum');
		}else{
			$sql=$this->db->get('view_forum', $limit, $offset);
		}
		return $sql->result();
	}

	public function get_thread($id='')
	{
		$this->db->where('id', $id);
		$sql = $this->db->get('view_forum');
		return $sql->result();
	}

	public function get_thread_by_id($id='')
	{
		$this->db->where('id', $id);
		$sql = $this->db->get('view_forum');
		return $sql->result();
	}

	//menginputkan data registrasi
	public function add($param=''){
		$data=array( 'users' => $param['user'],
					'title' => $param['title'],
					'categories' => $param['categories'],
					// 'image' => $param['img'],
					'content' => $param['isi'],
					'created_by' => $param['created_by'],
					'date' => $param['date']
					);
		$result=$this->db->insert('forums',$data);
		return $this->db->affected_rows();
	}

	//mengedit thread
	public function edit($param='')
	{
		$data=array( 'users' => $param['user'],
					'title' => $param['title'],
					'categories' => $param['categories'],
					// 'image' => $param['img'],
					'content' => $param['isi'],
					'modified_by' => $param['edit_by'],
					'modified' => $param['date']
					);
		$this->db->where('idForums',$param['id_current']);
		$sql = $this->db->update('forums', $data);
		// echo $this->db->last_query();exit;
		return $this->db->affected_rows();
	}
}
/* End of file m_cforums.php */

/* Location: ./application/modules/client/models/m_cforums.php */