<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_forum extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin_forum';
		$user = $this->session->userdata('swhpsession');
		$this->user = $user[0]->level;
		$this->load->model('m_admin_forum','fdb');
	}

	//menampilkan data forum
	public function load_forum(){
		$data['cname'] = $this->cname;
		$data['title'] = "List Data Forum";
		$data['forum'] = $this->fdb->get_forum();
		$data['content'] = $this->load->view('/admin_forum',$data,TRUE);
		$this->load->view('/template', $data);
	}

	//menghapus forum
	public function delete_forum(){
		$id = $this->input->post('id');
		// print_r($id);exit;
		$delete = $this->fdb->delete($id);
		if($delete==TRUE){
			echo "1|".succ_msg("Data Berhasil di hapus");
        }else{
        	echo "0|".err_msg("Gagal, coba beberapa saat kembali");
        }
	}
}
/* End of file admin_forum.php */

/* Location: ./application/modules/admin/controllers/admin_forum.php */