<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_rekap_and_monitor extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('rekap_and_monitor_model'));
    }

	public function get_Monitoring_CWP_for_invoice()
	{
		$listhasil = $this->ekspor_model->Monitoring_CWP_for_invoice();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_rekapitulasi_Invoice($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil)
	{
		$listhasil = $this->rekap_and_monitor_model->rekapitulasi_Invoice($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_rekapitulasi_Invoice_additional($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil)
	{
		$listhasil = $this->rekap_and_monitor_model->rekapitulasi_Invoice_additional($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_rekapitulasi_weighing($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil)
	{
		$listhasil = $this->rekap_and_monitor_model->rekapitulasi_weighing($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

}	