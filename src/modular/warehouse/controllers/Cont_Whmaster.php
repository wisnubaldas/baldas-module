<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_Whmaster extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('Whmaster_model'));
    }	
	
	public function get_list_airport($AirportCode=null)
	{
		$listhasil = $this->Whmaster_model->list_airport($AirportCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_tools_file_transfer($WarehouseCode)
	{
		$listhasil = $this->Whmaster_model->tools_file_transfer($WarehouseCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_shift($ShiftName=null)
	{
		$listhasil = $this->Whmaster_model->list_shift($ShiftName);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_mst_airlines($namafield,$isifield)
	{
		$listhasil = $this->Whmaster_model->mst_airlines($namafield,$isifield);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_daftar_airlines($WHcode,$TwoLetterCode=null)
	{
		$listhasil = $this->Whmaster_model->daftar_airlines($WHcode,$TwoLetterCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_list_airlines($WHcode=null,$TwoLetterCode=null,$flagshipmentType=null)
	{
		$listhasil = $this->Whmaster_model->list_airlines($WHcode,$TwoLetterCode,$flagshipmentType);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_warehouse($kd_Gudang=null)
	{
		$listhasil = $this->Whmaster_model->list_warehouse($kd_Gudang);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_type_warehouse($WarehouseCode=null)
	{
		$listhasil = $this->Whmaster_model->type_warehouse($WarehouseCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_WhOperator($WHOperatorCode=null)
	{
		$listhasil = $this->Whmaster_model->list_WhOperator($WHOperatorCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_natureofgood($nat_code=null)
	{
		$listhasil = $this->Whmaster_model->list_natureofgood($nat_code);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_natureofgood_name($nat_description=null)
	{
		$listhasil = $this->Whmaster_model->list_natureofgood_name($nat_description);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_location($WarehouseCode=null,$LocationCode=null)
	{
		$listhasil = $this->Whmaster_model->list_location($WarehouseCode,$LocationCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_route($WarehouseCode=null,$TwoLetterCode=null,$Route=null)
	{
		$listhasil = $this->Whmaster_model->list_route($WarehouseCode,$TwoLetterCode,$Route);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_flight($WarehouseCode,$TwoLetterCode,$Route,$FlightNumber=null)
	{
		$listhasil = $this->Whmaster_model->list_flight($WarehouseCode,$TwoLetterCode,$Route,$FlightNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_mst_route($WarehouseCode,$FlightNumber=null)
	{
		$listhasil = $this->Whmaster_model->mst_route($WarehouseCode,$FlightNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_country($CountryCode=null)
	{
		$listhasil = $this->Whmaster_model->list_country($CountryCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_harmonized($HSCode=null)
	{
		$listhasil = $this->Whmaster_model->list_harmonized($HSCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list2_CountryCode($PlaceName=null)
	{
		$listhasil = $this->Whmaster_model->list2_CountryCode($PlaceName);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);	
	}
	
	public function get_list_CountryCode($PlaceCode=null)
	{
		$listhasil = $this->Whmaster_model->list_CountryCode($PlaceCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_customer($CustomerCode=null)
	{
		$listhasil = $this->Whmaster_model->list_customer($CustomerCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_gse($EquipmentCode=null)
	{
		$listhasil = $this->Whmaster_model->list_gse($EquipmentCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_arrival($AirlinesCode=null,$FlightNo=null)
	{
		$listhasil = $this->Whmaster_model->list_arrival($AirlinesCode,$FlightNo);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_departure($AirlinesCode=null,$FlightNo=null)
	{
		$listhasil = $this->Whmaster_model->list_departure($AirlinesCode,$FlightNo);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_customer_by_name($CompanyName=null)
	{
		$listhasil = $this->Whmaster_model->list_customer_by_name($CompanyName);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_discrepancy($DiscrepancyCode=null)
	{
		$listhasil = $this->Whmaster_model->list_discrepancy($DiscrepancyCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_list_number($DescriptionCode)
	{
		$listhasil = $this->Whmaster_model->list_number($DescriptionCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_update_list_number($DescriptionCode,$QueveNumber)
	{
		$listhasil = $this->Whmaster_model->update_list_number($DescriptionCode,$QueveNumber);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_kd_dok_inout($keterangan=null)
	{
		$listhasil = $this->Whmaster_model->list_kd_dok_inout($keterangan);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public function get_kodegudang($databaseCode,$warehouseCode)
	{
		$listhasil = $this->Whmaster_model->kodegudang($databaseCode,$warehouseCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_m_beacukai($kd_KBPC=null)
	{
		$listhasil = $this->Whmaster_model->m_beacukai($kd_KBPC);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_m_airlines($airlinescode=null)
	{
		$listhasil = $this->Whmaster_model->m_airlines($airlinescode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_m_airlines_bytps($kd_tps=null)
	{
		$listhasil = $this->Whmaster_model->m_airlines_bytps($kd_tps);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_m_kemasan($kd_kemasan=null)
	{
		$listhasil = $this->Whmaster_model->m_kemasan($kd_kemasan);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_m_tps($kd_kbpc=null)
	{
		$listhasil = $this->Whmaster_model->m_tps($kd_kbpc);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_m_gudang($kd_tps,$kd_gudang=null)
	{
		$listhasil = $this->Whmaster_model->m_gudang($kd_tps,$kd_gudang);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_mst_flight($TwoLetterCode=null)
	{
		$listhasil = $this->Whmaster_model->mst_flight($TwoLetterCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_master_alasan()
	{
		$listhasil = $this->Whmaster_model->master_alasan();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_tpsnumber($remarknum)
	{
		$listhasil = $this->Whmaster_model->list_tpsnumber($remarknum);
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
	public function get_list_tokenname($databaseCode,$DepartmenCode)
	{
		$listhasil = $this->Whmaster_model->list_tokenname($databaseCode,$DepartmenCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
		exit($hasil);
	}
	
	public function get_service($noid=null)
	{
		$listhasil = $this->Whmaster_model->service($noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_subservice($id_service,$noid=null)
	{
		$listhasil = $this->Whmaster_model->subservice($id_service,$noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_invoiceAdditional($token,$HAWB,$type_inv)
	{
		$listhasil = $this->Whmaster_model->invoiceAdditional($token,$HAWB,$type_inv);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_report_invoiceAdditional($token,$WarehouseCode,$datefrom,$dateuntil)
	{
		$listhasil = $this->Whmaster_model->report_invoiceAdditional($token,$WarehouseCode,$datefrom,$dateuntil);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);
		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
}