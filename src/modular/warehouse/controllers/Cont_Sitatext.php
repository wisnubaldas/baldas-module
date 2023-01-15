<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Sitatext extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('sitatext_model'));
    }	

	public function proc_flag_sending_fsu($tablename,$MessageSent,$KeyCode)
	{
		$listhasil = $this->sitatext_model->flag_sending_fsu($tablename,$MessageSent,$KeyCode);
		// menjadikan objek menjadi JSON
		//$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
}