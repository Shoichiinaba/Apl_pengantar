<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class petugas_m extends CI_Model {
    	
	function __construct()
	{
		parent::__construct();
	}
	function index() 
		{
	
		}
	public function get_user(){

      return $this->db->get('admin')->result();
	}

  function get_petugas(){
  return $this->db->get('petugas')->result();
  }

	function delete($params =''){
        $sql = "DELETE  FROM petugas WHERE id_petugas = ? ";
        return $this->db->query($sql, $params);	
        }	

public function PTGS(){ 
      
      $this->db->SELECT('RIGHT(petugas.id_petugas,4) as kode', FALSE);
      $this->db->order_by('id_petugas','DESC');
      $this->db->limit(1);

      $query_ = $this->db->get('petugas');
      if($query_->num_rows() <> 0) 
      {
        $data_ = $query_->row();
        $kode_ = intval($data_->kode) + 1;
      }
      else 
      {
        $kode_ = 1;
      }
      $tahun = date("Y");
      $kode_max_ = str_pad($kode_, 4, "0", STR_PAD_LEFT);
      $kode_jadi = "PTGS-".$kode_max_;
      return $kode_jadi;
    }

    function kirim($id_petugas,$nama,$alamat,$rt,$rw,$no_tel,$email,$jabatan){

      $hasil=$this->db->query("INSERT INTO petugas(id_petugas,nama,alamat,rt,rw,no_tel,email,jabatan) VALUES ('$id_petugas','$nama','$alamat','$rt','$rw','$no_tel','$email','$jabatan')");
      return $hasil;
    }

    function ubah($id_petugas,$troop_) 
    {
        
        $this->db->where('id_petugas', $id_petugas);
        $this->db->update('petugas', $troop_);
    }




}