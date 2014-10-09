<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function cek_user($usname,$email){
		$sql = "select * from users where username = '$usname' OR email = '$email' ";
		$hasil = $this->db->query($sql);
		return $hasil->num_rows();
	}

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
}
/* End of file m_users.php */

/* Location: ./application/modules/client/models/m_users.php */