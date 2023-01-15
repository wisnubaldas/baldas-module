<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Search extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('search_model'));
    }	


	public function get_cari_import_mawb($MasterAWB)
	{
		$listhasil = $this->search_model->cari_import_mawb($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_import_hawb($MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->search_model->cari_import_hawb($MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_ekspor_mawb($MasterAWB=null)
	{
		$listhasil = $this->search_model->cari_ekspor_mawb($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public function get_cari_ekspor_hawb($MasterAWB=null,$HostAWB=null)
	{
		$listhasil = $this->search_model->cari_ekspor_hawb($MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public function get_cari_import_delivery($MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->search_model->cari_import_delivery($MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_import_invoice($MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->search_model->cari_import_invoice($MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_import_pod($MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->search_model->cari_import_pod($MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_cari_import_SO($hawb)
	{
		$listhasil = $this->search_model->cari_import_SO($hawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_eks_hawb($HostAWB=null)
	{
		$listhasil = $this->search_model->cari_eks_hawb($HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_imp_hawb($HostAWB=null)
	{
		$listhasil = $this->search_model->cari_imp_hawb($HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_ekspor_weighing($MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->search_model->cari_ekspor_weighing($MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_ekspor_invoice($MasterAWB,$ProofNumber=null)
	{
		$listhasil = $this->search_model->cari_ekspor_invoice($MasterAWB,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cari_ekspor_buildup($MasterAWB)
	{
		$listhasil = $this->search_model->cari_ekspor_buildup($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
}