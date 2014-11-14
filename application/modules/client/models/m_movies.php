<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_movies extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function get_film($param=''){
		$sql = "SELECT m.idMovies as id, m.name as film, m.categories as kategori, m.content as sinopsis, m.images as image, m.director as sutradara, m.play as tayang, c.`name` as bioskop
				FROM movies m, cinemas c
				WHERE m.id_cinema = c.idCinemas AND m.play BETWEEN ? AND ?";
		$res = $this->db->query($sql,array($param['tgl_from'],$param['tgl_to']));
		// echo $this->db->last_query();exit;
		return $res->result();
	}
	public function get_film_by_id($id=''){
		$sql = "SELECT m.idMovies as id, m.name as film, m.categories as kategori, m.content as sinopsis, m.images as image, m.director as sutradara, m.play as tayang, c.`name` as bioskop
				FROM movies m, cinemas c
				WHERE m.id_cinema = c.idCinemas AND m.play AND m.idMovies = ?";
		$res = $this->db->query($sql,array($id));
		// echo $this->db->last_query();exit;
		return $res->result();
	}

	public function get_filter_film($param=''){
		$this->db->select('idMovies, id_cinema, name');
		$this->db->where('id_cinema', $param['bioskop']);
		$sql = $this->db->get('movies');
		return $sql->result();
	}

	public function movie($id){
		$this->db->select('idMovies, name');
		$this->db->where('idMovies', $id);
		$sql = $this->db->get('movies');
		return $sql->result();
	}

}
/* End of file m_movies.php */

/* Location: ./application/modules/client/models/m_movies.php */