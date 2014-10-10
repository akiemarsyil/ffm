<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_user extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		// $this->cname='admin';
		// $this->load->model('m_users','udb');
	}

	//menampilkan data user
	public function load_user(){

	}

	//mengedit status aktivasi user
	public function edit_user(){

	}
}
/* End of file admin_user.php */

/* Location: ./application/modules/admin/controllers/admin_user.php */