<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Client extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='client';

	}

	public function index(){
		$data['cname'] = $this->cname;
		$data['title'] = 'Film Fantasy Malang';
		$data['content'] = $this->load->view('/main',$data,true);
		$this->load->view('/template',$data);
	}

	public function login(){
		$data['cname'] = $this->cname;
		$data['content'] = $this->load->view('/login',$data,true);
		$this->load->view('/template',$data);
	}

	public function doLogin(){

	}

	public function register(){
		$data['cname'] = $this->cname;
		$data['content'] = $this->load->view('/register',$data,true);
		$this->load->view('/template',$data);
	}

	public function doRegister(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');

		if($this->form_validation->run()== FALSE){
			$this->session->set_flashdata('flash_message', err_msg(validation_errors()));
			$this->session->set_flashdata('post_item', $this->input->post());
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$param = $this->input->post();
		}
	}
}
/* End of file client.php */

/* Location: ./application/modules/client/controllers/client.php */