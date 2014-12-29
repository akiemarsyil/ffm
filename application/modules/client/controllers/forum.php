<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Forum extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='forum';
		$this->load->model('m_forums','fdb');
		$this->load->model('m_reply','rdb');
	}

	//menampilkan halaman awal forum
	public function index(){
		//percobaan
		$user = $this->session->userdata('swhpsession');
		if($user != null){
			$data['title'] = 'Forum FFM';
			$data['content'] = $this->load->view('/forum',$data,true);
			$this->load->view('/template',$data);
		}else{
			$data['title'] = 'Permission Denied';
			$data['content'] = $this->load->view('/permission_denied',$data,true);
			$this->load->view('/template',$data);
		}
	}

	public function load_forum($value='')
	{
		//harus memisah untuk meload daftar forum agar pagination berjalan
		$limit=3;
		$uri=4;//uri untuk no sesudah /forum/
		$offset=$this->uri->segment($uri)?$this->uri->segment($uri):0;//offset berdasarkan uri segment
		// $data['forum'] = $this->fdb->get_forum($limit,$offset);
		$data['forum'] = $this->fdb->get_forum();
		$totalrow = count($this->fdb->get_forum());
		$data['paging'] = paging($this->module.'/'.$this->cname.'/load_forum/'.$value,$totalrow,$limit,$uri);
		$this->load->view('detail_forum',$data);
	}

	public function forum_thread($id='')
	{
		$user = $this->session->userdata('swhpsession');
		$data['sesi'] = $user[0]->idUser;
		//harus memisah untuk meload daftar forum agar pagination berjalan
		$limit=3;
		$uri=4;//uri untuk no sesudah /forum/
		$offset=$this->uri->segment($uri)?$this->uri->segment($uri):0;//offset berdasarkan uri segment
		$data['title'] = 'Forum Fantasy Film Malang';
		$data['thread'] = $this->fdb->get_thread($id);
		// $data['reply'] = $this->rdb->get_reply($limit,$offset);
 		$data['content'] = $this->load->view('/thread',$data,true);
		$this->load->view('/template',$data);
	}

	//mengambil semua data forum
	public function form_forum($id=''){
		$data['title'] = 'Forum Fantasy Film Malang';
		$user = $this->session->userdata('swhpsession');
		$data['sesi'] = $user[0]->idUser;
		$data['user'] = $user[0]->username;
		$data['aksi'] = 'add';
		if($id){
			$content = $this->fdb->get_thread_by_id($id);
			$data['forum'] = $content;
			$data['title'] = 'Edit Forum';
			$data['aksi'] = 'edit';
		}
		$data['content'] = $this->load->view('/form_forum',$data,true);
		$this->load->view('/template',$data);
	}

	//mengambil semua data reply
	public function reply($id=""){
		$data['title'] = 'Forum Fantasy Film Malang';
		$user = $this->session->userdata('swhpsession');
		$data['sesi'] = $user[0]->idUser;
		$data['user'] = $user[0]->username;
		$data['thread'] = $id;
		$data['aksi'] = 'add';
		if($id){
			// $content = $this->acdb->get_bioskop_by_id($id);
			$data['reply'] = $content;
			$data['title'] = 'Edit Forum';
			$data['aksi'] = 'edit';
		}
		$data['content'] = $this->load->view('/form_forum',$data,true);
		$this->load->view('/template',$data);

	}

	//menginputkan forum baru
	public function do_forum(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Judul', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('flash_message',err_msg(validation_errors()));
			redirect($this->module.'/'.$this->cname.'form_forum');
		}else{
			$param = $this->input->post();
			$user = $this->session->userdata('swhpsession');
			$param['created_by'] = $user[0]->username;
			$param['user'] = $user[0]->idUser;
			// $param['images'] = '';
			// print_r($param);exit;
			// $path = "public/assets/forum/";
			// if(isset($_FILES['images'])){
			// 	$valid_formats = array("jpg","png","JPG","PNG");
			// 	$name = $_FILES['images']['name'];
			// 	if(strlen($name)){
			// 		$ext= end(explode(".",$name));
			// 		if(in_array($ext, $valid_formats)){
			// 			if(move_uploaded_file($_FILES['images']['tmp_name'], $path.$_FILES['images']['name'])){
			// 				$param['images'] = $_FILES['images']['name'];	
			// 			}else{
			// 				$this->session->set_flashdata('flash_message',err_msg("Failed Upload File"));
			// 			}
			// 		}else{
			// 			$this->session->set_flashdata('flash_message',err_msg("Wrong Format //File"));
			// 		}
			// 	}
			// }
			$param['date'] =  date('Y-m-d H:i:s');
				
			$save = $this->fdb->add($param);
			if($save == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Tambahkan'));
			}else{
					$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
				}
        	redirect($this->module.'/'.$this->cname);
		}
	}

	//mengedit forum jika session user == id user forum
	public function edit_forum(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Judul', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('flash_message',err_msg(validation_errors()));
			redirect($this->module.'/'.$this->cname.'form_forum');
		}else{
			$param = $this->input->post();
			$user = $this->session->userdata('swhpsession');
			$param['edit_by'] = $user[0]->username;
			$param['user'] = $user[0]->idUser;
			$param['date'] =  date('Y-m-d H:i:s');
				
			$edit = $this->fdb->edit($param);
			if($edit == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Data berhasil di Tambahkan'));
			}else{
					$this->session->set_flashdata('flash_message',err_msg('Terjadi Kesalahan, coba beberapa saat lagi'));
				}
        	redirect($this->module.'/'.$this->cname);
		}
	}

	//menginputkan reply baru
	public function do_reply(){

	}

	//mengedit reply jika session user == id user reply
	public function edit_reply(){

	}
	
	//melakukan komplain terhadap forum (posting utama bukan reply)
	public function complain_forum(){

	}

	//melakukan komplain terhadap user
	public function complain_user(){

	}
}
/* End of file forum.php */

/* Location: ./application/modules/client/controllers/forum.php */