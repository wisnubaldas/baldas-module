<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Void extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('void_model'));
    }	
	
	public function get_void_eks_booking($MasterAWB)
	{
		$listhasil = $this->void_model->void_eks_booking($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_void_eks_approval($MasterAWB,$HostAWB)
	{
		$listhasil = $this->void_model->void_eks_approval($MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_void_eks_weighingheader($ProofNumber)
	{
		$listhasil = $this->void_model->void_eks_weighingheader($ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_void_eks_invoice($InvoiceNumber)
	{
		$listhasil = $this->void_model->void_eks_invoice($InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_void_eks_buildup($MasterAWB)
	{
		$listhasil = $this->void_model->void_eks_buildup($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public function get_void_imp_breakdown($BreakdownNumber)
	{
		$listhasil = $this->void_model->void_imp_breakdown($BreakdownNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_void_imp_breakdown_detail($BreakdownNumber,$noid)
	{
		$listhasil = $this->void_model->void_imp_breakdown_detail($BreakdownNumber,$noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_void_imp_deliorderheader($DONumber)
	{
		$listhasil = $this->void_model->void_imp_deliorderheader($DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_void_imp_invoice($InvoiceNumber)
	{
		$listhasil = $this->void_model->void_imp_invoice($InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_void_imp_pod($TravelNumber)
	{
		$listhasil = $this->void_model->void_imp_pod($TravelNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
}