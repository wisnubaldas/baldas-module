<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Status extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('status_model'));
    }	
	
	public function get_check_inc_break_detail($MasterAWB=null)
	{
		$listhasil = $this->status_model->check_inc_break_detail($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_inc_break_header()
	{
		$listhasil = $this->status_model->check_inc_break_header();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_inc_deliveryord_detail($MasterAWB=null)
	{
		$listhasil = $this->status_model->check_inc_deliveryord_detail($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_inc_deliveryord_header($Noid)
	{
		$listhasil = $this->status_model->check_inc_deliveryord_header($Noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_inc_pod_detail($MasterAWB=null)
	{
		$listhasil = $this->status_model->check_inc_pod_detail($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_inc_pod_header($Noid)
	{
		$listhasil = $this->status_model->check_inc_pod_header($Noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
}