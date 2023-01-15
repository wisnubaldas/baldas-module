<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Login extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('login_model'));
    }	

	public function get_list_logindepartmen($EmployeeNumber)
	{
		$listhasil = $this->login_model->list_logindepartmen($EmployeeNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function test($EmployeeNumber)
	{
		echo 'hello';
	}
	// ambil data untuk data user
	public function get_list_loginTPS($EmployeeNumber)
	{
		$listhasil = $this->login_model->list_loginTPS($EmployeeNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_login_database($EmployeeNumber,$TPScode=null,$DepartmenCode=null)
	{
		$listhasil = $this->login_model->login_database($EmployeeNumber,$TPScode,$DepartmenCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_login_password($userID)
	{
		$listhasil = $this->login_model->login_password($userID);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_login_user($fieldname,$EmployeeContent)
	{
		$listhasil = $this->login_model->login_user($fieldname,$EmployeeContent);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_login_username($EmployeeName=null)
	{
		$listhasil = $this->login_model->login_username($EmployeeName);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_login_permission($EmployeeName=null,$databaseName=null,$JenisGudang=null)
	{
		$listhasil = $this->login_model->login_permission($EmployeeName,$databaseName,$JenisGudang);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_datetime_Server()
	{
		$listhasil = $this->login_model->datetime_Server();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}


}