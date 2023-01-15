<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Ekspor extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('ekspor_model'));
    }	
	
	public function get_Monitoring_hawb_for_approval($token)
	{
		$listhasil = $this->ekspor_model->Monitoring_hawb_for_approval($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_Monitoring_CWP_for_invoice($token,$ProofNumber=null)
	{
		$listhasil = $this->ekspor_model->Monitoring_CWP_for_invoice($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_approval($token,$MasterAWB=null,$HostAWB=null)
	{
		$listhasil = $this->ekspor_model->list_eks_approval($token,$MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_eks_booking($token,$AirlinesCode,$FlightNo,$DateOfFlight)
	{
		$listhasil = $this->ekspor_model->eks_booking($token,$AirlinesCode,$FlightNo,$DateOfFlight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_booking($token,$MasterAWB=null)
	{
		$listhasil = $this->ekspor_model->list_eks_booking($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_table_npe($token,$namafield,$isifield)
	{
		$listhasil = $this->ekspor_model->table_npe($token,$namafield,$isifield);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_eks_dokcustom($token,$InvoiceNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_dokcustom($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_hostawb($token,$MasterAWB=null,$HostAWB=null)
	{
		$listhasil = $this->ekspor_model->list_eks_hostawb($token,$MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_waybill_invoice($token,$ProofNumber)
	{
		$listhasil = $this->ekspor_model->list_waybill_invoice($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_masterwaybill($token,$MasterAWB=null)
	{
		$listhasil = $this->ekspor_model->list_eks_masterwaybill($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_schedule($AirlinesCode=null)
	{
		$listhasil = $this->ekspor_model->list_eks_schedule($AirlinesCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_waybill_weighing($token,$MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->ekspor_model->list_waybill_weighing($token,$MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_eks_weighingheader($token,$ProofNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_weighingheader($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_weighingdetail($token,$ProofNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_weighingdetail($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_weighingvol($token,$ProofNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_weighingvol($token,$ProofNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_weighingspechand($token,$MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->ekspor_model->list_eks_weighingspechand($token,$MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_invoiceheader($token,$InvoiceNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_invoiceheader($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_invoicedetail($token,$InvoiceNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_invoicedetail($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_invoiceheader($token,$DateOfTransaction)
	{
		$listhasil = $this->ekspor_model->list_invoiceheader($token,$DateOfTransaction);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_sticker($token)
	{
		$listhasil = $this->ekspor_model->list_eks_sticker($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_storage($token)
	{
		$listhasil = $this->ekspor_model->list_eks_storage($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_buildupheader($token,$BuildupNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_buildupheader($token,$BuildupNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_buildupdetail($token,$BuildupNumber=null)
	{
		$listhasil = $this->ekspor_model->list_eks_buildupdetail($token,$BuildupNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_waybill_buildupdetail($token,$MasterAWB)
	{
		$listhasil = $this->ekspor_model->list_waybill_buildupdetail($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_buildupoffload($token)
	{
		$listhasil = $this->ekspor_model->list_eks_buildupoffload($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_buildup($token,$AirlinesCode,$FlightNumber,$DateOfFlight)
	{
		$listhasil = $this->ekspor_model->list_buildup($token,$AirlinesCode,$FlightNumber,$DateOfFlight);
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
		$listhasil = $this->ekspor_model->weighing_for_build($token,$AirlinesCode,$FlightNumber,$DateOfFlight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_build_uld_name($token,$BuildUpNumber)
	{
		$listhasil = $this->ekspor_model->build_uld_name($token,$BuildUpNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_build_waybill($BuildUpNumber,$UldCardNumber)
	{
		$listhasil = $this->ekspor_model->build_waybill($BuildUpNumber,$UldCardNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_totalpieces($token,$namatable,$fieldcheck,$namafield,$isifield)
	{
		$listhasil = $this->ekspor_model->totalpieces($token,$namatable,$fieldcheck,$namafield,$isifield);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_CheckMandatory($namatable,$MasterAWB,$namafield,$isifield=null)
	{
		$listhasil = $this->ekspor_model->CheckMandatory($namatable,$MasterAWB,$namafield,$isifield);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_CheckValidCWP($token,$MasterAWB,$HostAWB=null)
	{
		$listhasil = $this->ekspor_model->CheckValidCWP($token,$MasterAWB,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_manifest_buildup($token,$AirlinesCode,$DateOfFlight)
	{
		$listhasil = $this->ekspor_model->manifest_buildup($token,$AirlinesCode,$DateOfFlight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_eks_weighing_label($token,$HostAWB)
	{
		$listhasil = $this->ekspor_model->list_eks_weighing_label($token,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
}