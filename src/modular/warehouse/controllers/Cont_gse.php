<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_gse extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('Gse_model'));
    }	
	
	public function get_list_master_gse()
	{
		$listhasil = $this->Gse_model->list_master_gse();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_rental_master_gse($EquipmentCode)
	{
		$listhasil = $this->Gse_model->list_rental_master_gse($EquipmentCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
}