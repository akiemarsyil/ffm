<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_cinemas extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//menyimpan data bioskop
	public function simpan($param=''){
		$data=array( 'name' => $param['name'],
					'address' => $param['address'],
					'images' => $param['images'],
					'created' => $param['created'],
					'created_by' => $param['created_by'],
					'modified' => '',
					'modified_by' => '',
					'description' => $param['description'],
					'telephone' => $param['telephone']
					);
		$result=$this->db->insert('cinemas',$data);
		return $this->db->affected_rows();
	}

	//menampilkan daftar bioskop
	public function get_bioskop(){
		$sql = $this->db->get('cinemas');
		return $sql->result();
	}
}
/* End of file m_admin_cinemas.php */

/* Location: ./application/modules/admin/models/m_admin_cinemas.php */