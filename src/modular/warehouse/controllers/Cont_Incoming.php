<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Incoming extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('incoming_model'));
    }	

	public function get_list_inc_breakdownheader($token,$BreakdownNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_breakdownheader($token,$BreakdownNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_breakdownheader_airl_flight_date($token,$nilai=null,$dateflight)
	{
		$listhasil = $this->incoming_model->breakdownheader_airl_flight_date($token,$nilai,$dateflight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_breakdowndetail($token,$BreakdownNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_breakdowndetail($token,$BreakdownNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_deliorderheader($token,$DONumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_deliorderheader($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_inc_deliorderdetail($token,$DONumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_deliorderdetail($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_invoiceheader($token,$InvoiceNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_invoiceheader($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_invoicedetail($token,$InvoiceNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_invoicedetail($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_irreg($token,$IrregNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_irreg($token,$IrregNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_weighingdetail($token,$ProofNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_weighingdetail($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_inc_weighingheader($token,$ProofNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_weighingheader($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_inc_weighingvolume($token,$ProofNumber=null)
	{
		$listhasil = $this->incoming_model->list_inc_weighingvolume($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_cargodemage($token,$MasterAWB=null)
	{
		$listhasil = $this->incoming_model->list_inc_cargodemage($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_storage($MasterAWB=null)
	{
		$listhasil = $this->incoming_model->get_list_inc_storage($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_podheader($token,$pod_number=null)
	{
		$listhasil = $this->incoming_model->list_inc_podheader($token,$pod_number);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_poddetail($token,$pod_number=null)
	{
		$listhasil = $this->incoming_model->list_inc_poddetail($token,$pod_number);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_stockofname($token,$AirlinesCode=null)
	{
		$listhasil = $this->incoming_model->list_inc_stockofname($token,$AirlinesCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
		
	}
	
}