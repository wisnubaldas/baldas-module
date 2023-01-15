<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	
	private $db2;
	private $db3;	
    function __construct()
    {
        parent::__construct();						
		$this->db2 = $this->load->database('rdinterchangemessage', TRUE);	
		$this->db3 = $this->load->database('rdlogin_read', TRUE);	
    }

    public function list_logindepartmen($EmployeeNumber)
	{
		$this->db3->distinct();
		$this->db3->select('*');
		$this->db3->from('masterdepartmen');	
		$this->db3->join('logindepartmen', 'masterdepartmen.DepartmenCode = logindepartmen.DepartmenCode');	
		$this->db3->where('EmployeeNumber=',$EmployeeNumber);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function list_loginTPS($EmployeeNumber)
	{
		$this->db3->distinct();
		$this->db3->select('mastertps.*');
		$this->db3->from('mastertps');	
		$this->db3->join('logintps', 'mastertps.TPScode = logintps.TPScode');		
		$this->db3->where('EmployeeNumber=',$EmployeeNumber);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function login_database($EmployeeNumber,$TPScode=null,$DepartmenCode=null)
	{
		$this->db3->distinct();
		$this->db3->select('*');
		$this->db3->where('EmployeeNumber=',$EmployeeNumber);
		if(!is_null($TPScode))$this->db3->where('TPScode=',$TPScode);
		if(!is_null($DepartmenCode))$this->db3->where('DepartmenCode=',$DepartmenCode);
		$query = $this->db3->get('logindatabase');
		return $query->result();
	}
	
	public function login_password($userID)
	{
		$this->db3->distinct();
		$this->db3->select('*');
		$this->db3->where('userID=',$userID);
		$query = $this->db3->get('loginpassword');
		return $query->result();
	}
	
	public function login_user($fieldname,$EmployeeContent=null)
	{
		$this->db3->distinct();
		$this->db3->select('*');
		if ($fieldname == 'EmployeeNumber')
		{
			$this->db3->where('EmployeeNumber=',$EmployeeContent);
		}
		else if ($fieldname == 'EmployeeName')
		{
			if(!is_null($EmployeeContent))$this->db3->where('EmployeeName',$EmployeeContent);
		}		
		$query = $this->db3->get('loginuser');
		return $query->result();
	}
	
	public function login_username($EmployeeName=null)
	{
		$this->db3->distinct();
		$this->db3->select('*');
		if(!is_null($EmployeeName))$this->db3->where('EmployeeName',$EmployeeName);	
		$query = $this->db3->get('loginuser');
		return $query->result();
	}
	
	public function login_permission($EmployeeNumber=null,$databaseName=null,$JenisGudang=null)
	{
		$this->db3->distinct();
		$this->db3->select('*');
		if(!is_null($EmployeeNumber))$this->db3->where('EmployeeNumber',$EmployeeNumber);	
		if(!is_null($databaseName))$this->db3->where('databaseName',$databaseName);	
		if(!is_null($JenisGudang))$this->db3->where("(JenisGudang='ALL' OR JenisGudang='".$JenisGudang."')");	
		$query = $this->db3->get('loginpermission');
		return $query->result();
	}
	
	public function datetime_Server()
	{
		$query=$this->db3->query('select sysdate() as waktu');		
		return $query->result();
	}
	
}