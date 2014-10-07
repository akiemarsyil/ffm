<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Client extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->module='client';
		$this->cname='client';

	}

	public function index(){
		$data['cname'] = $this->cname;
		$data['title'] = 'Film Fantasy Malang';
		$data['content'] = $this->load->view('/main',$data,true);
		$this->load->view('/template',$data);
	}
}
/* End of file client.php */

/* Location: ./application/modules/client/controllers/client.php */