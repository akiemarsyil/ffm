<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_schedule extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function schedule($param){
		$this->db->select('hari, pukul');		
		$this->db->where('id_cinema = '.$param['cinema'].' AND id_movie = '.$param['movie']);
		$sql = $this->db->get('schedule');
		// echo $this->db->last_query();exit;
		return $sql->result();
	}
}
/* End of file m_schedule.php */

/* Location: ./application/modules/client/models/m_schedule.php */