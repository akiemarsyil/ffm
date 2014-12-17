<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ticket extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='ticket';
		$this->load->model('m_tickets','tdb');
		$this->load->model('m_cinemas','cdb');
		$this->load->model('m_movies','mdb');
		$this->load->model('m_users','udb');
		$this->load->model('m_schedule','sdb');
	}

	//menampilkan halaman awal menu ticket
	public function index(){
		//percobaan
		$user = $this->session->userdata('swhpsession');
		if($user != null){
			$data['title'] = 'Reservasi Ticket';
			$data['bioskop'] = $this->cdb->get_cinema();
			$data['user'] = $user[0]->idUser;
			$data['content'] = $this->load->view('/ticket',$data,true);
			$this->load->view('/template',$data);
		}else{
			$data['title'] = 'Permission Denied';
			$data['content'] = $this->load->view('/permission_denied',$data,true);
			$this->load->view('/template',$data);
		}
	}

	//menampilkan dropdown film
	public function get_film(){
		$param = $this->input->post();
		$film = $this->mdb->get_filter_film($param);
		$opt = '<option value=""></option>';
		foreach ($film as $value) {
			$opt .= '<option value="'.$value->idMovies.'">'.$value->name.'</option>';
		}
		echo $opt;
	}

	public function load_form_ticket(){
		$user = $this->session->userdata('swhpsession');
		$data['usr'] = $user[0]->idUser;
		$param = $this->input->post();
		$data['user'] = $this->udb->user($param['id']);
		$data['cinema'] = $this->cdb->cinema($param['cinema']);
		$data['movie'] = $this->mdb->movie($param['movie']);
		$data['jadwal'] = $this->sdb->schedule($param);
		$data['stock'] = $this->tdb->ticket($param);
		$this->load->view('/form_tiket',$data);
	}

	public function pesan_ticket(){
		$param = $this->input->post();
		// print_r($param);exit;
		$param['order'] =  date('Y-m-d H:i:s');
		$total = $param['harga'] * $param['jml'];
		$param['total'] = $total;
		$insert = $this->tdb->pesan_ticket($param);
        if($insert == true){
        	echo '1|'.succ_msg('Data berhasil dimasukkan, silahkan cetak kartu anda');
        }else{
        	echo '0|'.warn_msg('Terjadi Kesalahan, coba beberapa saat lagi');	
        }
	}

	public function cetak_ticket(){
		$this->load->library('pdf');
		$param = $this->input->post();
		// $data = $this->vjdb->get_matkul_by_lecture($param);
		// print_r($param);exit;
		$data['tgl'] = date('Y-m-d H:i:s');
		$data['param'] = $param;
		$this->load->view('cetak_tiket',$data);
	}
}
/* End of file ticket.php */

/* Location: ./application/modules/client/controllers/ticket.php */