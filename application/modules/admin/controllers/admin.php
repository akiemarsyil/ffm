<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin';
		$this->load->model('m_admin_users','audb');
	}

	//melakukan authentication hanya admin saja yang bisa mengakses halaman admin
	public function index(){
		$user = $this->session->userdata('swhpsession');
		$param = $this->audb->cek_admin($user[0]->level);
		if($user != null){
			if($param[0]->level == '1'){
				$data['title'] = 'Welcome';
				$data['content'] = $this->load->view('/main', $data, TRUE);
				$this->load->view('admin/template', $data);
			}else{
				$data['title'] = 'access denied';
				$data['content'] = $this->load->view('/access_denied', $data, TRUE);
				$this->load->view('/template', $data);
			}
		}else{
			redirect('/client/login');
		}
	}
}
/* End of file admin.php */

/* Location: ./application/modules/admin/controllers/admin.php */