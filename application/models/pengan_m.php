<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class pengan_m extends CI_Model {
    	
	function __construct()
	{
		parent::__construct();
	}
	function index() 
		{
			
		}
	public function get_all(){
		return $this->db->get('pengantar')->result();
	}

	public function get_pengantar($keyword){
		$this->db->query("SELECT * FROM 'pengantar' WHERE 'no_pengatar' = '$keyword'"); 
		return $this->db->get()->result();
	}	

	function get_data_nik($NIK){
		$hsl=$this->db->query("SELECT * FROM penduduk WHERE NIK='$NIK'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'NIK' => $data->NIK,
					'nama' => $data->nama,
					);
			}
		}
		return $hasil;
	}

	 function get_all_pengantar(){
        $query = $this->db->get('pengantar');
        return $result;
    }

    function search_pengantar($NIK){
		$this->db->like('NIK', $NIK , 'both');
		$this->db->order_by('NIK', 'DESC');
		$this->db->limit(10);
		return $this->db->get('pengantar')->result();
	}

    function simpan($No_pengantar,$Keperluan,$Lain_lain,$NIK,$status_rt,$status_rw){
    	$hasil=$this->db->query("INSERT INTO pengantar(no_pengantar,keperluan,lain_lain,NIK,status_rt,status_rw) VALUES ('$No_pengantar','$Keperluan','$Lain_lain','$NIK','1','1')");
    	return $hasil;
    }
			
}

