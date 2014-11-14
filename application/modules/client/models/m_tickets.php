<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tickets extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function ticket($param){
		$this->db->select('harga, stock');
		$this->db->where('id_film = '.$param['movie'].' AND id_bioskop ='.$param['cinema']);
		$sql = $this->db->get('ticket_stock');
		return $sql->result();
	}

	public function pesan_ticket($param){
		$data = array('user_id'=> $param['us_id'],
						'name'=>$param['name'],
						'play'=>$param['pukul'],
						'day'=>$param['hari'],
						'cinema'=>$param['cinema'],
						'price'=>$param['harga'],
						'count'=>$param['jml'],
						'total'=>$param['total'],
						'oder_date'=>$param['order'],
						'film'=>$param['movie']);
		$result=$this->db->insert('tickets',$data);
		return $this->db->affected_rows();
	}
}
/* End of file m_tickets.php */

/* Location: ./application/modules/client/models/m_tickets.php */