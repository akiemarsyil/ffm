<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin';
		$this->load->model('m_admin_users','audb');
		$this->load->model('m_admin_cinemas','acdb');
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
		$data['content'] = $this->load->view('/admin_bioskop',$data,TRUE);
		$this->load->view('/template', $data);
	}

	//menampilkan form tambah bioskop
	public function form_bioskop(){
		$data['cname'] = $this->cname;
		$data['title'] = "List Data Bioskop | Master Bioskop";
		$data['content'] = $this->load->view('/admin_form_bioskop',$data,TRUE);
		$this->load->view('/template', $data);
	}

	//insert bioskop baru
	public function tambah_bioskop(){
		$param = $this->input->post();
		$path = "public/assets/cinema/";
		$user = $this->session->userdata('swhpsession');
		$param['created_by'] = $user[0]->username;
		// print_r($param);exit;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            $this->session->set_flashdata('flash_message',err_msg(validation_errors()));
			redirect($_SERVER['HTTP_REFERER']);
        } else {
        	if(isset($_FILES['images'])){
					$valid_formats = array("jpg","png","JPG","PNG");
					$name = $_FILES['images']['name'];
					if(strlen($name)){
						$ext= end(explode(".",$name));
						if(in_array($ext, $valid_formats)){
							if(move_uploaded_file($_FILES['images']['tmp_name'], $path.$_FILES['images']['name'])){
								$param['images'] = $_FILES['images']['name'];	
							}else{
								$this->session->set_flashdata('flash_message',err_msg("Failed Upload File"));
							}
						}else{
							$this->session->set_flashdata('flash_message',err_msg("Wrong Format //File"));
						}
					}
				}
        	$param['created'] =  date('Y-m-d H:i:s');
        	$save = $this->acdb->simpan($param);
        	if($save == true){
					$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Tambahkan'));
				}else{
					$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
				}
        	redirect($this->module.'/admin_bioskop');
        }
	}
}
/* End of file admin.php */

/* Location: ./application/modules/admin/controllers/admin.php */