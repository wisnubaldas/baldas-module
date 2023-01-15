<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Import extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('import_model'));
    }	
	
	public function get_list_stockOfname($token,$AirlinesCode)
	{
		$listhasil = $this->import_model->list_stockOfname($token,$AirlinesCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);

		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public  function get_list_imp_masterwaybill($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_imp_masterwaybill($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);

		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_hostawb($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_imp_hostawb($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_bc11($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_imp_bc11($token,$MasterAWB);
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
		$listhasil = $this->import_model->breakdownheader_airl_flight_date($token,$nilai,$dateflight);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_breakdownheader($token,$BreakdownNumber=null)
	{
		$listhasil = $this->import_model->list_imp_breakdownheader($token,$BreakdownNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_breakdowndetail($token,$BreakdownNumber=null)
	{
		$listhasil = $this->import_model->list_imp_breakdowndetail($token,$BreakdownNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_ATA_breakdowndetail($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_ATA_breakdowndetail($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_master_breakdowndetail($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_master_breakdowndetail($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_cargodemage($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_imp_cargodemage($token,$MasterAWB);
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
		$listhasil = $this->import_model->list_imp_deliorderheader($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_imp_deliorderdetail($token,$DONumber=null)
	{
		$listhasil = $this->import_model->list_imp_deliorderdetail($token,$DONumber);
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
		$listhasil = $this->import_model->list_invoiceheader($token,$DateOfTransaction);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_invoice_pecahpos($token,$InvoiceNumber=null)
	{
		$listhasil = $this->import_model->list_invoice_pecahpos($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_invoiceheader($token,$InvoiceNumber=null)
	{
		$listhasil = $this->import_model->list_imp_invoiceheader($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_invoicedetail($token,$InvoiceNumber=null)
	{
		$listhasil = $this->import_model->list_imp_invoicedetail($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_waybill_invoice($token,$DONumber)
	{
		$listhasil = $this->import_model->list_waybill_invoice($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_waybill_delivery($token,$MasterAWB)
	{
		$listhasil = $this->import_model->list_waybill_delivery($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_invoicepecahpos($token,$InvoiceNumber=null)
	{
		$listhasil = $this->import_model->list_imp_invoicepecahpos($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_irreg($token,$IrregNumber=null)
	{
		$listhasil = $this->import_model->list_imp_irreg($token,$IrregNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_irregpic($token)
	{
		$listhasil = $this->import_model->list_imp_irregpic($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_location($token,$HostAWB=null)
	{
		$listhasil = $this->import_model->list_imp_location($token,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_noa($token,$namafield,$isifield=null)
	{
		$listhasil = $this->import_model->list_imp_noa($token,$namafield,$isifield);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_obheader($token,$BreakdownNumber=null)
	{
		$listhasil = $this->import_model->list_imp_obheader($token,$BreakdownNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_obdetail($token,$BreakdownNumber=null)
	{
		$listhasil = $this->import_model->list_imp_obdetail($token,$BreakdownNumber);
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
		$listhasil = $this->import_model->list_master_obdetail($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_imp_podheader($token,$TravelNumber=null)
	{
		$listhasil = $this->import_model->list_imp_podheader($token,$TravelNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_poddetail($token,$TravelNumber=null)
	{
		$listhasil = $this->import_model->list_imp_poddetail($token,$TravelNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_poddetail_hawb($token,$HostAWB=null)
	{
		$listhasil = $this->import_model->list_imp_poddetail_hawb($token,$HostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_poddetail_mawb($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_imp_poddetail_mawb($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	
	
	public function get_dlv_invoice($token,$InvoiceNumber=null)
	{
		$listhasil = $this->import_model->dlv_invoice($token,$InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_dlv_delivery($token,$DONumber=null)
	{
		$listhasil = $this->import_model->dlv_delivery($token,$DONumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_monitoring_imp_dlv($token,$thisdate)
	{
		$listhasil = $this->import_model->monitoring_imp_dlv($token,$thisdate);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_monitoring_breakdownn_for_delivery($token)
	{
		$listhasil = $this->import_model->monitoring_breakdownn_for_delivery($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_damage($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_damage($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_delivery_for_invoice($token)
	{
		$listhasil = $this->import_model->list_delivery_for_invoice($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_sppb_ecommerce($token,$limit)
	{
		$listhasil = $this->import_model->list_imp_sppb_ecommerce($token,$limit);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_scan_C1_fl_gate_0($token,$hawb=null)
	{
		$listhasil = $this->import_model->list_imp_scan_C1_fl_gate_0($token,$hawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_cargoout($token,$DateOfOut)
	{
		$listhasil = $this->import_model->list_cargoout($token,$DateOfOut);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_scan_c1($token,$tracking=null)
	{
		$listhasil = $this->import_model->list_imp_scan_c1($token,$tracking);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_location_mps($token,$mps=null)
	{
		$listhasil = $this->import_model->list_imp_location_mps($token,$mps);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_imp_location_mps_hostAWB($token,$hostAWB=null)
	{
		$listhasil = $this->import_model->list_imp_location_mps_hostAWB($token,$hostAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_imp_sppb_ecommerce_hawb($token,$hawb=null)
	{
		$listhasil = $this->import_model->list_imp_sppb_ecommerce_hawb($token,$hawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_imp_sppb_ecommerce_mawb($token,$mawb=null)
	{
		$listhasil = $this->import_model->list_imp_sppb_ecommerce_mawb($token,$mawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_imp_sppb_ecommerce_sppb($token,$sppb=null)
	{
		$listhasil = $this->import_model->list_imp_sppb_ecommerce_sppb($token,$sppb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_totalHAWB($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_totalHAWB($token,$MasterAWB);
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_inv_dokument_ATA_MasterAWB($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_inv_dokument_ATA_MasterAWB($token,$MasterAWB);
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_inv_pecahpos_MasterAWB($token,$MasterAWB=null)
	{
		$listhasil = $this->import_model->list_inv_pecahpos_MasterAWB($token,$MasterAWB);
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_proc_insert_impbc11($MasterAWB)
	{
		$listhasil = $this->import_model->proc_insert_impbc11($MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
}