<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_schedules extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
		//menampilkan daftar jadwal
	public function get_jadwal(){
		$sql = $this->db->get('schedule');
		return $sql->result();
	}

	//menampilkan daftar jadwal berdasar id
	public function get_jadwal_by_id($id=''){
		$sql = $this->db->get_where('schedule',array('idSchedules'=>$id));
		return $sql->result();
	}

	//menyimpan data jadwal
	public function simpan_jadwal($param=''){
		$data=array('id_cinema' => $param['id_bioskop'],
					'id_movie' => $param['id_film'],
					'nama' => $param['film'],
					'bioskop' => $param['bioskop'],
					'hari' => $param['hari'],
					'pukul' => $param['pukul']
					);
		$result=$this->db->insert('schedule',$data);
		return $this->db->affected_rows();
	}

	//melakukan perubahan data jadwal
	public function edit_jadwal($param=''){
		$data=array('id_cinema' => $param['id_bioskop'],
					'id_movie' => $param['id_film'],
					'nama' => $param['film'],
					'bioskop' => $param['bioskop'],
					'hari' => $param['hari'],
					'pukul' => $param['pukul']
					);
		$this->db->where('idSchedules',$param['id_current']);
		$sql = $this->db->update('schedule', $data);
		return $this->db->affected_rows();
	}

	//menghapus jadwal
	public function delete_jadwal($id=''){
		$sql = $this->db->delete('schedule',array('idSchedules'=>$id));
		return $this->db->affected_rows();
	}
}
/* End of file m_admin_schedules.php */

/* Location: ./application/modules/admin/models/m_admin_schedules.php */