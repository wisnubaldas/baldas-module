<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Outgoing extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('outgoing_model'));
    }

	public function get_list_out_approval($token,$MasterAWB=null)
	{
		$listhasil = $this->outgoing_model->list_out_approval($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_weighingheader($token,$ProofNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_weighingheader($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_weighingdetail($token,$ProofNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_weighingdetail($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_weighingvolume($token,$ProofNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_weighingvolume($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_weighinghandling($token,$ProofNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_weighinghandling($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_invoiceheader($token,$InvoiceNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_invoiceheader($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_invoicedetail($token,$InvoiceNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_invoicedetail($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_sticker($token,$MasterAWB)
	{
		$listhasil = $this->outgoing_model->list_out_sticker($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_storage($token,$MasterAWB)
	{
		$listhasil = $this->outgoing_model->list_out_storage($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_buildup($token,$AirlinesCode,$FlightNumber,$DateOfFlight)
	{
		$listhasil = $this->outgoing_model->list_out_buildup($token,$AirlinesCode,$FlightNumber,$DateOfFlight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_buildupheader($token,$BuildupNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_buildupheader($token,$BuildupNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_buildupdetail($token,$BuildupNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_buildupdetail($token,$BuildupNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_out_buildupoffload($token,$BuildupNumber=null)
	{
		$listhasil = $this->outgoing_model->list_out_buildupoffload($token,$BuildupNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public function get_weighing_for_build($token,$AirlinesCode,$FlightNumber,$DateOfFlight)
	{
		$listhasil = $this->outgoing_model->weighing_for_build($token,$AirlinesCode,$FlightNumber,$DateOfFlight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
		
	}


}