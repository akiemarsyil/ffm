<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_forum extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin_forum';
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

	}
}
/* End of file admin_forum.php */

/* Location: ./application/modules/admin/controllers/admin_forum.php */