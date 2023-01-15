<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Sigo extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('sigo_model'));
    }	

	public  function get_imp_header($token,$Invoicenumber)
	{
		$listhasil = $this->sigo_model->imp_header($token,$Invoicenumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public  function get_imp_detail($token,$Invoicenumber)
	{
		$listhasil = $this->sigo_model->imp_detail($token,$Invoicenumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public  function get_eks_header($token,$Invoicenumber)
	{
		$listhasil = $this->sigo_model->eks_header($token,$Invoicenumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public  function get_eks_detail($token,$Invoicenumber)
	{
		$listhasil = $this->sigo_model->eks_detail($token,$Invoicenumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_sigo_invoiceheader($token,$DateOfTransaction)
	{
		$listhasil = $this->sigo_model->list_sigo_invoiceheader($token,$DateOfTransaction);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
}