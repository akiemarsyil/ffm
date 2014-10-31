<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_user extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin_user';
		$user = $this->session->userdata('swhpsession');
		$this->user = $user[0]->level;
		$this->load->model('m_admin_users','udb');
	}

	//menampilkan data user
	public function load_user(){
		$data['cname'] = $this->cname;
		$data['title'] = "List Data User";
		$data['user'] = $this->udb->get_user();
		$data['content'] = $this->load->view('/admin_user',$data,TRUE);
		$this->load->view('/template', $data);
	}

	//menampilkan form edit
	public function edit($id=''){
		$data['title'] = "Informasi Member";
		$data['user'] = $this->udb->get_user_by_id($id);
		$data['content'] = $this->load->view('/admin_form_user',$data,TRUE);
		$this->load->view('/template', $data);	
	}

	//mengedit status aktivasi user
	public function edit_user(){

	}
}
/* End of file admin_user.php */

/* Location: ./application/modules/admin/controllers/admin_user.php */