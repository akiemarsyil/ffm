<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Client extends MX_Controller {

	public function __construct(){
		parent::__construct();

		$this->cname=('client');
	}

	public function index(){
		$this->load->view('template');
	}
}
/* End of file client.php */

/* Location: ./application/modules/client/controllers/client.php */