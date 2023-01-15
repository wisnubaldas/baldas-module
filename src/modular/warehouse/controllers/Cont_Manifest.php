<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Manifest extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('manifest_model'));
    }	

	public function get_inward_manifest($AirlinesCode,$FlightNo,$dateflight)
	{
		$listhasil = $this->manifest_model->inward_manifest($AirlinesCode,$FlightNo,$dateflight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_user_reg()
	{
		$listhasil = $this->manifest_model->user_reg();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
}