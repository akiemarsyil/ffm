<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends MY_Controller {
	public function bioskop(){
		$this->datatables->select('idCinemas,name,description,telephone,address')
		->add_column('Actions', get_detail_edit_delete('$1'),'id')
        ->from('cinemas');
        
        echo $this->datatables->generate();
	}
}
/* End of file _welcome.php */
/* Location: ./application/modules/admin/controllers/_datatable.php */