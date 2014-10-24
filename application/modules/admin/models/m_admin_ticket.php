<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_ticket extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//menampilkan daftar ticket
	public function get_ticket(){
		$sql = $this->db->get('ticket_stock');
		return $sql->result();
	}

	//menampilkan daftar ticket berdasar id
	public function get_ticket_by_id($id=''){
		$sql = $this->db->get_where('ticket_stock',array('id'=>$id));
		return $sql->result();
	}

	//menyimpan data ticket
	public function simpan_ticket($param=''){
		$data=array('id_cinema' => $param['cinema'],
					'name' => $param['name'],
					'director' => $param['director'],
					'content' => $param['content'],
					'images' => $param['images'],
					'categories' => $param['categories'],
					'play' => $param['play'],
					'create' => $param['created'],
					'create_by' => $param['created_by']
					);
		$result=$this->db->insert('ticket_stock',$data);
		return $this->db->affected_rows();
	}

	//melakukan perubahan data ticket
	public function edit_ticket($param=''){
		$data=array('id_cinema' => $param['cinema'],
					'name' => $param['name'],
					'director' => $param['director'],
					'content' => $param['content'],
					'images' => $param['images'],
					'categories' => $param['categories'],
					'play' => $param['play'],
					'modifed' => $param['modified'],
					'modified_by' => $param['modified_by']
					);
		$this->db->where('id',$param['id_current']);
		$sql = $this->db->update('ticket_stock', $data);
		return $this->db->affected_rows();
	}

	//menghapus ticket
	public function delete_ticket($id=''){
		$sql = $this->db->delete('ticket_stock',array('id'=>$id));
		return $this->db->affected_rows();
	}
}
/* End of file m_admin_ticket.php */

/* Location: ./application/modules/admin/models/m_admin_ticket.php */