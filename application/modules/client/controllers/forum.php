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
			$data['title'] = 'Forum FFM';
			$data['content'] = $this->load->view('/forum',$data,true);
			$this->load->view('/template',$data);
		}else{
			$data['title'] = 'Permission Denied';
			$data['content'] = $this->load->view('/permission_denied',$data,true);
			$this->load->view('/template',$data);
		}
	}

	//mengambil semua data forum
	public function form_forum($id=''){
		$data['title'] = 'Forum Fantasy Film Malang';
		$user = $this->session->userdata('swhpsession');
		$data['sesi'] = $user[0]->idUser;
		$data['user'] = $user[0]->username;
		$data['aksi'] = 'add';
		if($id){
			// $content = $this->acdb->get_bioskop_by_id($id);
			$data['forum'] = $content;
			$data['title'] = 'Edit Forum';
			$data['aksi'] = 'edit';
		}
		$data['content'] = $this->load->view('/form_forum',$data,true);
		$this->load->view('/template',$data);
	}

	//mengambil semua data reply
	public function reply(){

	}

	//menginputkan forum baru
	public function do_forum(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Judul', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('flash_message',err_msg(validation_errors()));
			redirect($this->module.'/'.$this->cname.'form_forum');
		}else{
			$param = $this->input->post();
			$path = "public/assets/forum/";
			// if(isset($_FILES['img'])){
			// 	$valid_formats = array("jpg","png","JPG","PNG");
			// 	$name = $_FILES['img']['name'];
			// 	if(strlen($name)){
			// 		$ext= end(explode(".",$name));
			// 		if(in_array($ext, $valid_formats)){
			// 			if(move_uploaded_file($_FILES['img']['tmp_name'], $path.$_FILES['img']['name'])){
			// 				$param['img'] = $_FILES['img']['name'];	
			// 			}else{
			// 				$this->session->set_flashdata('flash_message',err_msg("Failed Upload File"));
			// 			}
			// 		}else{
			// 			$this->session->set_flashdata('flash_message',err_msg("Wrong Format //File"));
			// 		}
			// 	}
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