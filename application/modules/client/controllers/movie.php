<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Movie extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='movie';
		$this->load->model('m_movies','mdb');
		$this->load->model('m_cinemas','cdb');
		$this->load->model('m_ratings','rdb');
	}

	//menampilkan halaman awal bioskop
	public function cinema(){
		$data['cname'] = $this->cname;
		$data['title'] = 'Film Fantasy Malang';
		$data['content'] = $this->load->view('/bioskop',$data,true);
		$this->load->view('/template',$data);
	}

	//menampilkan bioskop berdasar sorting tanggal
	public function load_cinema(){
		$data['cname'] = $this->cname;
		$data['title'] = 'Film Fantasy Malang';
		$data['bioskop'] = $this->cdb->get_cinema();
		// $data['content'] = $this->load->view('/load_bioskop',$data,true);
		$this->load->view('/load_bioskop',$data);
	}

	//menampilkan detail bioskop
	public function detail_cinema($id=''){
		$data['cname'] = $this->cname;
		$data['title'] = 'Film Fantasy Malang';
		$data['bioskop'] = $this->cdb->get_cinema_by_id($id);
		$data['rating'] = $this->rdb->get_rating();
		$data['content'] = $this->load->view('/detail_bioskop',$data,true);
		$this->load->view('/template',$data);
	}

	//menampilkan halaman awal lokasi bioskop
	public function film(){
		$data['cname'] = $this->cname;
		$data['title'] = 'Film Fantasy Malang';
		$data['content'] = $this->load->view('/movie',$data,true);
		$this->load->view('/template',$data);
	}

	//menampilkan jadwal film
	public function load_film(){
		$param = $this->input->post();
		$data['film'] = $this->mdb->get_film($param);
		$this->load->view('/list_movie',$data);	
	}

	//menampilkan detail bioskop
	public function detail_movie($id=''){
		$data['detail'] = $this->mdb->get_film_by_id($id);
		// print_r($data);exit;
		$data['content'] = $this->load->view('/detail_film',$data,true);
		$this->load->view('/template',$data);
	}

	//melakukan komen terhadap bioskop
	public function do_comment(){
		$param = $this->input->post();
		// print_r($param);exit;
		$save = $this->rdb->insert_rating($param);
		if($save == true){
			echo '1|'.succ_msg('Data berhasil dimasukkan');
		}else{
			echo '0|'.warn_msg('Terjadi Kesalahan, coba beberapa saat lagi');
		}
	}
}
/* End of file movie.php */

/* Location: ./application/modules/client/controllers/movie.php */