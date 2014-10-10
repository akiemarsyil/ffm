<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_forum extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		// $this->cname='admin';
		// $this->load->model('m_users','udb');
	}

	//menampilkan data forum
	public function load_forum(){

	}

	//menghapus forum
	public function delete_forum(){

	}
}
/* End of file admin_forum.php */

/* Location: ./application/modules/admin/controllers/admin_forum.php */