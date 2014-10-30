<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin';
		$user = $this->session->userdata('swhpsession');
		$this->user = $user[0]->level;
		$this->load->model('m_admin_users','audb');
		$this->load->model('m_admin_cinemas','acdb');
		$this->load->model('m_admin_movies','amdb');
		$this->load->model('m_admin_ticket','atdb');
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

	//menampilkan master bioskop
	public function bioskop(){
		$data['cname'] = $this->cname;
		$data['title'] = "List Data Bioskop | Master Bioskop";
		$data['bioskop'] = $this->acdb->get_bioskop();
		$data['content'] = $this->load->view('/admin_bioskop',$data,TRUE);
		$this->load->view('/template', $data);
	}

	//menampilkan filme
	public function film(){
		$data['cname'] = $this->cname;
		$data['title'] = "List Data Film | Master Film";
		$data['film'] = $this->amdb->get_film();
		$data['content'] = $this->load->view('/admin_film',$data,TRUE);
		$this->load->view('/template',$data);
	}

	//menampilkan ticket
	public function ticket(){
		$data['cname'] = $this->cname;
		$data['title'] = "List Data Ticket | Master Ticket";
		$data['ticket'] = $this->atdb->get_ticket();
		$data['content'] = $this->load->view('/admin_ticket',$data,TRUE);
		$this->load->view('/template',$data);
	}
}
/* End of file admin.php */

/* Location: ./application/modules/admin/controllers/admin.php */