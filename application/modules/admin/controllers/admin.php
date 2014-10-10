<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin';
		// $this->load->model('m_users','udb');
	}

	//melakukan authentication hanya admin saja yang bisa mengakses halaman admin
	public function auth(){

	}
}
/* End of file admin.php */

/* Location: ./application/modules/admin/controllers/admin.php */