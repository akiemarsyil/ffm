<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//mengecek ada username atau email yang sama pada database
	public function cek_user($usname,$email){
		$sql = "select * from users where username = '$usname' OR email = '$email' ";
		$hasil = $this->db->query($sql);
		return $hasil->num_rows();
	}

	//mencari user berdasar id
	public function get_user_by_id($param=''){
		$query = $this->db->get_where('users', array('idUser' => $param));
		// echo $this->db->last_query();exit;
		$result = $query->result();
		return $result;
	}

	public function edit_user($param=''){
		$password = paramEncrypt($param['passwd']);
		$data=array( 'password' => $password,
					'name' => $param['nama'],
					'address' => $param['alamat'],
					'city' => $param['kota'],
					'email' => $param['email'],
					'jenis_kelamin' => $param['jk'],
					'images' => $param['img'],
					'description' => '',
					'modified' => $param['reg_date']
					);
		$this->db->where('idUser',$param['id']);
		$query = $this->db->update('users', $data);
		return $this->db->affected_rows();
	}

	//menginputkan data registrasi
	public function add_user($param=''){
		$password = paramEncrypt($param['passwd']);
		$data=array( 'username' => $param['username'],
					'password' => $password,
					'name' => $param['nama'],
					'address' => $param['alamat'],
					'city' => $param['kota'],
					'email' => $param['email'],
					'jenis_kelamin' => $param['jk'],
					'images' => $param['img'],
					'isAktif' => $param['isAktif'],
					'level' => $param['level'],
					'description' => '',
					'reg_date' => $param['reg_date']
					);
		$result=$this->db->insert('users',$data);
		return $this->db->affected_rows();
	}

	//untuk merubah status user
	public function user_activation($uname=''){
		$this->db->where('username',$uname);
		$hasil = $this->db->update('users',array('isAktif'=>'yes'));

		if($hasil){
			return $this->db->affected_rows();
		}else{
			return false;	
		} 
	}

	//menangani login
	public function login($param=''){
		$where = array('username' => $param['username']);
		$query = $this->db->get_where('users', $where);
		// echo $this->db->last_query();exit;
		if($query==NULL){
			$data=FALSE;
		} else {
			$data = $query->result();
		}
		return $data;
	}
}
/* End of file m_users.php */

/* Location: ./application/modules/client/models/m_users.php */