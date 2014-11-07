<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ticket extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='ticket';
		$this->load->model('m_tickets','tdb');
	}

	//menampilkan halaman awal menu ticket
	public function index(){
		//percobaan
		$user = $this->session->userdata('swhpsession');
		if($user != null){
			$data['title'] = 'Reservasi Ticket';
			$data[]
			$data['content'] = $this->load->view('/ticket',$data,true);
			$this->load->view('/template',$data);
		}else{
			$data['title'] = 'Permission Denied';
			$data['content'] = $this->load->view('/permission_denied',$data,true);
			$this->load->view('/template',$data);
		}
	}

	//menampilkan judul film yang tersedia pada bioskop
	public function show_movie(){
		
	}

	//melakukan proses ketika pemesanan tiket
	public function do_reservasi(){

	}

	//mencetak bukti reservasi ticket
	public function cetak(){

	}
}
/* End of file ticket.php */

/* Location: ./application/modules/client/controllers/ticket.php */