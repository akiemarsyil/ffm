<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_master extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='admin';
		$this->cname='admin_master';
		$this->load->model('m_admin_cinemas','acdb');
		$this->load->model('m_admin_movies','amdb');
	}

	//menampilkan form tambah atau edit bioskop
	public function form_bioskop($id=''){
		$data['cname'] = $this->cname;
		$data['title'] = "Tambah Bioskop";
		$data['aksi'] = 'add';
		if($id){
			$content = $this->acdb->get_bioskop_by_id($id);
			$data['bioskop'] = $content;
			$data['title'] = 'Edit Bioskop';
			$data['aksi'] = 'edit';
		}
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
        	$save = $this->acdb->simpan_bioskop($param);
        	if($save == true){
					$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Tambahkan'));
				}else{
					$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
				}
        	redirect($this->module.'/bioskop');
        }
	}

	//edit bioskop
	public function edit_bioskop($id=''){
		$param = $this->input->post();
		$path = "public/assets/cinema/";
		$user = $this->session->userdata('swhpsession');
		$param['modified_by'] = $user[0]->username;

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
        			// @unlink($path.$param['img_old']);
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
        	$param['modified'] =  date('Y-m-d H:i:s');
        	$edit = $this->acdb->edit_bioskop($param);
        	if($edit == true){
					$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Tambahkan'));
				}else{
					$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
				}
        	redirect($this->module.'/bioskop');
        }
	}

	//delete bioskop
	public function delete_bioskop($id=''){
		$hasil = $this->acdb->delete_bioskop($id);
		if($hasil == true){
			$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Hapus'));
		}else{
			$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
		}
		redirect($this->module.'/bioskop');
	}

	//menampilkan form tambah atau edit film
	public function form_film($id=''){
		$data['cname'] = $this->cname;
		$data['title'] = "Tambah Film";
		$data['aksi'] = 'add';
		$data['bioskop'] = $this->acdb->get_bioskop();
		// print_r($data);exit;
		if($id){
			$content = $this->amdb->get_film_by_id($id);
			$data['film'] = $content;
			$data['title'] = 'Edit Bioskop';
			$data['aksi'] = 'edit';
		}
		$data['content'] = $this->load->view('/admin_form_film',$data,TRUE);
		$this->load->view('/template', $data);
	}

	//insert film baru
	public function tambah_film(){
		$param = $this->input->post();
		$path = "public/assets/movie/";
		$user = $this->session->userdata('swhpsession');
		$param['created_by'] = $user[0]->username;
		// print_r($param);exit;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('director', 'Direktor', 'trim|required|xss_clean');
		$this->form_validation->set_rules('categories', 'Kategori', 'trim|required|xss_clean');
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
        	$save = $this->amdb->simpan_film($param);
        	if($save == true){
					$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Tambahkan'));
				}else{
					$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
				}
        	redirect($this->module.'/film');
        }
	}

	//edit film
	public function edit_film($id=''){
		$param = $this->input->post();
		$path = "public/assets/movie/";
		$user = $this->session->userdata('swhpsession');
		$param['modified_by'] = $user[0]->username;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('director', 'director', 'trim|required|xss_clean');
		$this->form_validation->set_rules('categories', 'Kategori', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            $this->session->set_flashdata('flash_message',err_msg(validation_errors()));
			redirect($_SERVER['HTTP_REFERER']);
        } else {
        	if(isset($_FILES['images'])){
        			// @unlink($path.$param['img_old']);
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
        	$param['modified'] =  date('Y-m-d H:i:s');
        	$edit = $this->amdb->edit_film($param);
        	if($edit == true){
					$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Tambahkan'));
				}else{
					$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
				}
        	redirect($this->module.'/film');
        }
	}

	//delete film
	public function delete_film($id=''){
		$hasil = $this->amdb->delete_film($id);
		if($hasil == true){
			$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Hapus'));
		}else{
			$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
		}
		redirect($this->module.'/film');
	}
}
/* End of file admin_master.php */

/* Location: ./application/modules/admin/controllers/admin_master.php */