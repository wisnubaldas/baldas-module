<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Updflag_model extends CI_Model
{
	private $db7;	
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt', TRUE);	
    }
	
	public function update_flag($namatable,$keycode,$namafield,$nilaiField)
	{
		if ($namatable=='eks_weighingheader')
		{
			if ($namafield=='FHL')
			{
				$data = array(
					'FHL' => $nilaiField
				);
			}
			else if ($namafield=='RCS')
			{
				$data = array(
					'RCS' => $nilaiField
				);
			}
			else if ($namafield=='FWB')
			{
				$data = array(
					'FWB' => $nilaiField
				);
			}			
			else if ($namafield=='PaymentCode')
			{
				$nilaiFlag='1';
				
				$data = array(
					'PaymentCode' 	=> $nilaiFlag,
					'InvoiceNumber'	=> $nilaiField
				);
			}
			$this->db7->where('ProofNumber=',$keycode);	
			$this->db7->update('eks_weighingheader', $data);
		}
		else if ($namatable=='eks_hostawb')
		{
			if ($namafield=='FHL')
			{
				$data = array(
					'FHL' => $nilaiField
				);
			}
			$this->db7->where('HostAWB=',$keycode);	
			$this->db7->update('eks_hostawb',$data);
		}
		else if ($namatable=='eks_buildupdetail')
		{
			if ($namafield=='FFM')
			{
				$data = array(
					'FFM' => $nilaiField
				);
			}
			$this->db7->where('Noid=',$Noid);	
			$this->db7->update('eks_buildupdetail',$data);
		}
	}
	
	public function update_void($namatable,$namafield,$nilaiField)
	{
		$nilaiFlag='1';
		$data = array(
			'void' => $nilaiField
		);
		$this->db7->where($namafield,$nilaiField);	
		$this->db7->update($namafield,$data);
	}
	
	public function update_field($namatable,$keyfield,$keyvalue,$updatefield,$updatevalue)
	{
		$data = array(
			$updatefield => $updatevalue
		);
		$this->db7->where($keyfield,$keyvalue);	
		$this->db7->update($namatable,$data);
	}
	
}