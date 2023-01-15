<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_rubah extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('rubah_model'));
    }	
	
	public function get_update_data($namatable,$keycode,$namafield,$nilaiField)
	{
		$listhasil = $this->rubah_model->update_data($namatable,$keycode,$namafield,$nilaiField);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_update_void($namatable,$namacode,$nilaicode)
	{
		$listhasil = $this->rubah_model->update_void($namatable,$namacode,$nilaicode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_update_flag($namatable,$namafield,$namacode,$nilaicode)
	{
		$listhasil = $this->rubah_model->update_flag($namatable,$namafield,$namacode,$nilaicode);
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
		$listhasil = $this->rubah_model->update_dinamis($namatable,$namafield,$isifield,$namacode,$nilaicode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_update_dinamis_tps($namatable,$namafield,$isifield,$namacode,$nilaicode)
	{
		$listhasil = $this->rubah_model->update_dinamis_tps($namatable,$namafield,$isifield,$namacode,$nilaicode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	
	public function get_update_bebas($myquery)
	{
		$listhasil = $this->rubah_model->update_bebas($myquery);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
}