<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Movie extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='movie';
		$this->load->model('m_movies','mdb');
	}

	//menampilkan halaman awal bioskop
	public function cinema(){

	}

	//menampilkan bioskop berdasar sorting tanggal
	public function load_cinema(){
		

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

	//memberikan rating pada bioskop
	public function rating(){

	}

	//menampilkan komentar terhadap bioskop
	public function comment(){
		
	}

	//melakukan komen terhadap bioskop
	public function do_comment(){

	}
}
/* End of file movie.php */

/* Location: ./application/modules/client/controllers/movie.php */