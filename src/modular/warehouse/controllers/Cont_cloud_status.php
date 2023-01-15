<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cont_cloud_status extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('status_cloud_model'));
    }	
	
	public function get_full_Check_Status($tps,$id_first)
	{
		$listhasil = $this->status_cloud_model->full_Check_status($tps,$id_first);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_total_inbound_delivery_aircarft($id_header,$status_date,$status_time,$airline_code,$flight_no,$origin,$dest)
	{
		$listhasil = $this->status_cloud_model->total_inbound_delivery_aircarft($id_header,$status_date,$status_time,$airline_code,$flight_no,$origin,$dest);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_th_inbound_international($waybill_smu,$hawb=null)
	{
		$listhasil = $this->status_cloud_model->check_th_inbound_international($waybill_smu,$hawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_th_outbond_international($waybill_smu,$hawb=null)
	{
		$listhasil = $this->status_cloud_model->check_th_outbond_international($waybill_smu,$hawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_th_inbound_domestik($waybill_smu=null)
	{
		$listhasil = $this->status_cloud_model->check_th_inbound_domestik($waybill_smu);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_check_th_outbond_domestik($waybill_smu=null)
	{
		$listhasil = $this->status_cloud_model->check_th_outbond_domestik($waybill_smu);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_update_dinamis($namatable,$namafield,$isifield,$namacode,$nilaicode)
	{
		$listhasil = $this->status_cloud_model->update_dinamis($namatable,$namafield,$isifield,$namacode,$nilaicode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
}