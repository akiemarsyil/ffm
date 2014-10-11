<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Client extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='client';
		$this->load->model('m_users','udb');
	}

	//menampilkan halaman awal
	public function index(){
		$data['cname'] = $this->cname;
		$data['title'] = 'Film Fantasy Malang';
		$data['content'] = $this->load->view('/main',$data,true);
		$this->load->view('/template',$data);
	}

	//menampilkan halaman login
	public function login(){
		$data['cname'] = $this->cname;
		$data['content'] = $this->load->view('/login',$data,true);
		$this->load->view('/template',$data);
	}

	//fungsi menangani ketika login
	public function do_login(){
		$param = $this->input->post();
		$login = $this->udb->login($param);
		if ($login != null) {
			$this->session->set_userdata('swhpsession',$login);
            redirect($this->module);
		}else{
			$this->session->set_flashdata('flash_message', err_msg('Username atau password salah'));
		}
	}

	//fungsi untuk logout
	public function do_logout(){
		$this->session->unset_userdata('swhpsession');
		redirect($this->modul);
	}

	//menampilkan halaman registrasi
	public function register(){
		$data['cname'] = $this->cname;
		$data['content'] = $this->load->view('/register',$data,true);
		$this->load->view('/template',$data);
	}

	//fungsi menangani registrasi dan pengiriman email aktivasi
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
			$param['img']= 'no_image.jpg';
			$path = "public/assets/uploads/";
			$cek = $this->udb->cek_user($param['username'],$param['email']);
			
			if($cek){
				$this->session->set_flashdata('flash_message', err_msg('Registration failed, username or email has been registered'));
			}else{
				if(isset($_FILES['img'])){
					$valid_formats = array("jpg","png","JPG","PNG");
					$name = $_FILES['img']['name'];
					if(strlen($name)){
						$ext= end(explode(".",$name));
						if(in_array($ext, $valid_formats)){
							if(move_uploaded_file($_FILES['img']['tmp_name'], $path.$_FILES['img']['name'])){
								$param['img'] = $_FILES['img']['name'];	
							}else{
								$this->session->set_flashdata('flash_message',err_msg("Failed Upload File"));
							}
						}else{
							$this->session->set_flashdata('flash_message',err_msg("Wrong Format //File"));
						}
					}
				}

                $param['reg_date'] = date('Y-m-d H:i:s');
                
                $save = $this->udb->add_user($param);
                	
                	if ($save == TRUE){
                		$to = $param['email'];
						$subject =  'Film Fantasy Malang Account Activation ';
						$message = 'Registered on '.date("Y-m-d H:i:s").
						'<br>Email : '.$param['email'].
						'<br>Username : '.$param['username'].
						'<br>Password : '.$param['passwd'].
						'<br><br><br>Click here for activation : '.base_url().'client/client/activation/'.paramEncrypt($param['username']);

						send_email($to, $subject, $message);
                    	$this->session->set_flashdata('flash_message', succ_msg('Registration success, please check your email for activation'));
                	}else{
                    	$this->session->set_flashdata('flash_message', err_msg('Terjadi kesalahan. Coba beberapa saat lagi'));
                	}
                	
                	redirect($this->module.'/register');
			}	
		}
	}

		//fungsi menangani activation user
		public function activation($uname=''){
			$uname = paramDecrypt($uname);
			$result = $this->udb->user_activation($uname);
			if($result){
				$this->session->set_flashdata('flash_message', succ_msg('Akun '.$uname.' telah berhasil diaktivasi')); 
			}else{
				$this->session->set_flashdata('flash_message', err_msg('Akun '.$uname.' gagal diaktivasi'));
			}
			redirect($this->module.'/'.$this->cname.'/login');
		}
}
/* End of file client.php */

/* Location: ./application/modules/client/controllers/client.php */