<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ticket extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='ticket';
		// $this->load->model('m_users','udb');
	}

	//menampilkan halaman awal menu ticket
	public function index(){

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