<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class validasi_m extends CI_Model {
    	
	function __construct()
	{
		parent::__construct();
	}
	function index() 
		{
	
		}

    public function select_all() {
    $data = $this->db->get('pengantar');

    return $data->result();
  }

	public function get_validasi($status_rt = '1'){

      $this->db->select('pengantar.*, penduduk.NIK AS NIK, penduduk.nama');
      $this->db->join('penduduk', 'pengantar.NIK = penduduk.NIK');
      $this->db->where('status_rt', $status_rt);
      $query = $this->db->get('pengantar');
      return $query->result();
	}

  public function get_validasiR($status_rt = '2' , $status_rw = '1'){
      $this->db->select('pengantar.*, penduduk.NIK AS NIK, penduduk.nama');
      $this->db->join('penduduk', 'pengantar.NIK = penduduk.NIK');
      $this->db->where('status_rt', $status_rt);
      $this->db->where('status_rw', $status_rw);
      $data = $this->db->get('pengantar');
      return $data->result();
  }
  
  public function get_validasiKEL($status_rw = '2'){
      $this->db->select('pengantar.*, penduduk.NIK AS NIK, penduduk.nama');
      $this->db->join('penduduk', 'pengantar.NIK = penduduk.NIK');
      $this->db->where('status_rw', $status_rw);
      $data = $this->db->get('pengantar');
      return $data->result();
  }

	function delete($params =''){
        $sql = "DELETE  FROM pengantar WHERE no_pengantar = ? ";
        return $this->db->query($sql, $params);	
        }	

    function validat($NIK,$troop_) 
    {
        
        $this->db->where('NIK', $NIK);
        $this->db->update('pengantar', $troop_);
    }

    public function get_cetak($no){
      $this->db->select('pengantar.*, penduduk.NIK AS NIK, penduduk.nama, penduduk.jenis_kel, penduduk.tempat_lahir, penduduk.tgl_lahir, penduduk.kewarganegaraan, penduduk.agama, penduduk.status, penduduk.pendidikan_ter, penduduk.alamat, penduduk.pekerjaan,penduduk.RT,penduduk.RW');
      $this->db->join('penduduk', 'pengantar.NIK = penduduk.NIK');
      $this->db->where('no_pengantar',$no);
      $sql = $this->db->get('pengantar');
        return ($sql->num_rows() < 1)?'NO_DATA_QUERY':$sql->result_array();
  }


    public function search_pengantar($no_pengantar){
      $this->db->select('pengantar.*, penduduk.NIK AS NIK, penduduk.nama');
      $this->db->join('penduduk', 'pengantar.NIK = penduduk.NIK');
      $this->db->like('no_pengantar', $no_pengantar , 'both');
      $this->db->limit(10);
      $data = $this->db->get('pengantar');
      return $data->result();
  }

  public function get_daspeng(){

       $data = $this->db->get('pengantar');

        return $data->num_rows();
  }
    public function select_by_pengantar($status_rt) {
    $sql = "SELECT COUNT(*) AS jml FROM pengantar WHERE status_rt = {$status_rt}";

    $data = $this->db->query($sql);

    return $data->row();
  }
}
