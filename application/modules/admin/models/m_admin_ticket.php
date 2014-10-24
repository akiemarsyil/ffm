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

	//menampilkan daftar film berdasar id
	public function get_film_by_id($id=''){
		$sql = $this->db->get_where('movies',array('idMovies'=>$id));
		return $sql->result();
	}

	//menyimpan data film
	public function simpan_film($param=''){
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
		$result=$this->db->insert('movies',$data);
		return $this->db->affected_rows();
	}

	//melakukan perubahan data film
	public function edit_film($param=''){
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
		$this->db->where('idMovies',$param['id_current']);
		$sql = $this->db->update('movies', $data);
		return $this->db->affected_rows();
	}

	//menghapus film
	public function delete_film($id=''){
		$sql = $this->db->delete('movies',array('idMovies'=>$id));
		return $this->db->affected_rows();
	}
}
/* End of file m_admin_ticket.php */

/* Location: ./application/modules/admin/models/m_admin_ticket.php */