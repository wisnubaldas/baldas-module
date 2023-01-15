<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_finance extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('finance_model'));
    }	
	
	public function get_drsc_import($shifname,$dateDRSC,$PaymentCode,$token)
	{
		$listhasil = $this->finance_model->drsc_import($shifname,$dateDRSC,$PaymentCode,$token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_drsc_ekspor($shifname,$dateDRSC,$PaymentCode,$token)
	{
		$listhasil = $this->finance_model->drsc_ekspor($shifname,$dateDRSC,$PaymentCode,$token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_basicprice($LocationCode,$WarehouseCode,$AgreementCode,$Datetransaction,$totOverstay)
	{
		$listhasil = $this->finance_model->list_basicprice($LocationCode,$WarehouseCode,$AgreementCode,$Datetransaction,$totOverstay);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_aggrement($WarehouseCode,$DatabaseCode,$kd_gudang)
	{
		$listhasil = $this->finance_model->list_aggrement($WarehouseCode,$DatabaseCode,$kd_gudang);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function list_fare_directory($WarehouseCode,$AgreementCode)
	{
		$listhasil = $this->finance_model->list_fare_directory($WarehouseCode,$AgreementCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_pajakBynumber($token,$TaxAwal,$TaxAkhir)
	{
		$listhasil = $this->finance_model->list_pajakBynumber($token,$TaxAwal,$TaxAkhir);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_pajakBydate($token,$DateFrom,$DateUntil)
	{
		$listhasil = $this->finance_model->list_pajakBydate($token,$DateFrom,$DateUntil);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_totalfaktur($warehouse_npwp)
	{
		$listhasil = $this->finance_model->totalfaktur($warehouse_npwp);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_deposit_invoice($InvoiceNumber)
	{
		$listhasil = $this->finance_model->deposit_invoice($InvoiceNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_depositheader($DepositCode)
	{
		$listhasil = $this->finance_model->list_depositheader($DepositCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_depositdetail($WarehouseCode,$DepositCode,$firstdate,$lastdate)
	{
		$listhasil = $this->finance_model->list_depositdetail($WarehouseCode,$DepositCode,$firstdate,$lastdate);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	public function get_Summary_deposit($WarehouseCode,$DepositCode,$firstdate)
	{
		$listhasil = $this->finance_model->Summary_deposit($WarehouseCode,$DepositCode,$firstdate);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_depositnominal($DepositCode,$WarehouseCode=null)
	{
		$listhasil = $this->finance_model->list_depositnominal($DepositCode,$WarehouseCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_depositor($udepositor=null)
	{
		$listhasil = $this->finance_model->list_depositor($udepositor);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);	
	}
	
	public function get_nomor_tax($warehouse_npwp)
	{
		$listhasil = $this->finance_model->nomor_tax($warehouse_npwp);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);	
	}
	
	
}