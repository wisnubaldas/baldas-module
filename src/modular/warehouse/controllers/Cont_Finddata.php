<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Finddata extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('finddata_model'));
    }
	
	public function get_list_master_breakdowndetail($token,$MasterAWB=null)
	{
		$listhasil = $this->finddata_model->list_master_breakdowndetail($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_master_obdetail($token,$MasterAWB=null)
	{
		$listhasil = $this->finddata_model->list_master_obdetail($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_hawb_detail($token,$AgenCode,$HostAWB=null)
	{
		$listhasil = $this->finddata_model->list_hawb_detail($token,$AgenCode,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public function get_list_imp_breakdownheader($token,$gabung=null)
	{
		$listhasil = $this->finddata_model->list_imp_breakdownheader($token,$gabung);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_obheader($token,$gabung=null)
	{
		$listhasil = $this->finddata_model->list_imp_obheader($token,$gabung);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_irreg($token,$gabung=null)
	{
		$listhasil = $this->finddata_model->list_imp_irreg($token,$gabung);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_NOA_masterAWB($token,$MasterAWB=null)
	{
		$listhasil = $this->finddata_model->list_imp_NOA_masterAWB($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_booking($token,$gabung=null)
	{
		$listhasil = $this->finddata_model->list_eks_booking($token,$gabung);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_weighing_master($token,$MasterAWB=null)
	{
		$listhasil = $this->finddata_model->list_eks_weighing_master($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_buildupheader($token,$gabung=null)
	{
		$listhasil = $this->finddata_model->list_eks_buildupheader($token,$gabung);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_deliorderheader($token,$DONumber=null)
	{
		$listhasil = $this->finddata_model->list_imp_deliorderheader($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_invoiceheader($token,$WhCode,$MasterAWB=null)
	{
		$listhasil = $this->finddata_model->list_invoiceheader($token,$WhCode,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_doc_delivery_hawb($token,$Consigneename=null)
	{
		$listhasil = $this->finddata_model->list_doc_delivery_hawb($token,$Consigneename);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_doc_delivery($token,$MasterAWB=null)
	{
		$listhasil = $this->finddata_model->list_doc_delivery($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_delivery_for_cargo_out($token,$DONumber=null)
	{
		$listhasil = $this->finddata_model->delivery_for_cargo_out($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_breakdowndetail($token,$MasterAWB=null)
	{
		$listhasil = $this->finddata_model->list_inc_breakdowndetail($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_inc_weighing($token,$ProofNumber=null)
	{
		$listhasil = $this->finddata_model->list_inc_weighing($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inc_delivery($token,$DONumber=null)
	{
		$listhasil = $this->finddata_model->list_inc_delivery($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
}