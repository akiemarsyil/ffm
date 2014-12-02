<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Forum extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='forum';
		$this->load->model('m_forums','fdb');
	}

	//menampilkan halaman awal forum
	public function index(){
		//percobaan
		$user = $this->session->userdata('swhpsession');
		if($user != null){
			redirect($this->modul.'/'.$this->cname);
		}else{
			$data['title'] = 'Permission Denied';
			$data['content'] = $this->load->view('/permission_denied',$data,true);
			$this->load->view('/template',$data);
		}
	}

	//mengambil semua data forum
	public function form_forum(){
		$data['title'] = 'Forum Fantasy Film Malang';
		$user = $this->session->userdata('swhpsession');
		$data['sesi'] = $user[0]->idUser;
		$data['aksi'] = 'add';
		$data['content'] = $this->load->view('/form_forum',$data,true);
		$this->load->view('/template',$data);
	}

	//mengambil semua data reply
	public function reply(){

	}

	//menginputkan forum baru
	public function do_forum(){
		$param = $this->input->post();
		print_r($param);exit;
		$user = $this->session->userdata('swhpsession');
		$uname = $user[0]->username;
		$created = $user[0]->idUser;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Judul', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			echo "0|".warn_msg(validation_errors());
		}else{
			$param['created'] =  date('Y-m-d H:i:s');
			$param['user'] = $uname;
			$param['created'] = $created;
			$save = $this->fdb->add($param);
			if($save == true){
        		echo '1|'.succ_msg('Data berhasil dimasukkan, silahkan cetak kartu anda');
        	}else{
        		echo '0|'.warn_msg('Terjadi Kesalahan, coba beberapa saat lagi');	
        	}
		}
	}

	//mengedit forum jika session user == id user forum
	public function edit_forum(){

	}

	//menginputkan reply baru
	public function do_reply(){

	}

	//mengedit reply jika session user == id user reply
	public function edit_reply(){

	}
	
	//melakukan komplain terhadap forum (posting utama bukan reply)
	public function complain_forum(){

	}

	//melakukan komplain terhadap user
	public function complain_user(){

	}
}
/* End of file forum.php */

/* Location: ./application/modules/client/controllers/forum.php */