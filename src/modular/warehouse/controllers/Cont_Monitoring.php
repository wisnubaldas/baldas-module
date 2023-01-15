<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Monitoring extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('monitoring_model'));
    }	
	
	public function get_list_weighing_no_invoice()
	{
		$listhasil = $this->monitoring_model->list_weighing_no_invoice();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
}