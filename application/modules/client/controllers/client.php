<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Client extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='client';
		$this->load->model('m_users','udb');
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

	public function do_login(){

	}

	public function register(){
		$data['cname'] = $this->cname;
		$data['content'] = $this->load->view('/register',$data,true);
		$this->load->view('/template',$data);
	}

	public function do_register(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('passwd', 'Password', 'trim|required|matches[cfPasswd]');
		$this->form_validation->set_rules('cfPasswd', 'Password Confirmation', 'trim|required');

		if($this->form_validation->run()== FALSE){
			$this->session->set_flashdata('flash_message', err_msg(validation_errors()));
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$param = $this->input->post();
			$img = $_FILES['img'];
			$cek = $this->udb->cek_user($param['username'],$param['email']);
			if($cek){
				$this->session->set_flashdata('flash_message', err_msg('Registration failed, username or email has been registered'));
			}else{
				if($img['name']!=''){
                    $img = save_picture($photo['tmp_name'], $img['name'], $base_url().'assets/uploads/', 0, 0, 0, $img['size'], 7, "photo");
                    if($img['error']==1){
                        $this->session->set_flashdata('flash_msg', err_msg('<strong>Error...!</strong><br /> '.@$img['msg']));
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                }
                $param['img'] = @$img['nama_file'] ? $img['nama_file'] : 'no_image.jpg';
                $param['reg_date'] = date('Y-m-d H:i:s');

                $save = $this->udb->add_user($param);
                	if ($save == TRUE){
                    	$this->session->set_flashdata('flash_msg', succ_msg('Registration success, please check your email for activation'));
                	}else{
                    	$this->session->set_flashdata('flash_msg', err_msg('Terjadi kesalahan. Coba beberapa saat lagi'));
                	}
                	redirect($this->module.'/'.$this->client.'/register');
			}	
		}
	}
}
/* End of file client.php */

/* Location: ./application/modules/client/controllers/client.php */