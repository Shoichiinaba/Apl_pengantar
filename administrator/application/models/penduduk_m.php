<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class penduduk_m extends CI_Model {
        
    function __construct()
    {
        parent::__construct();
    }
    function index() 
        {
            
        }
    function get_all(){

        return $this->db->get('penduduk')->result();
                $this->db->where('RT ='.$username);
    }
    function del($params =''){
        $sql = "DELETE  FROM penduduk WHERE NIK = ? ";
        return $this->db->query($sql, $params); 
        }       

    function ubah($NIK,$troop_) 
    {
        
        $this->db->where('NIK', $NIK);
        $this->db->update('penduduk', $troop_);
    }
    function Kirim($NIK,$nama,$jenis_kel,$tempat_lahir,$tgl_lahir,$kewarganegaraan,$agama,$status,$pendidikan_ter,$alamat,$pekerjaan,$RT,$RW){
        $hasil=$this->db->query("INSERT INTO penduduk(NIK,nama,jenis_kel,tempat_lahir,tgl_lahir,kewarganegaraan,agama,status,pendidikan_ter,alamat,pekerjaan,RT,RW) VALUES ('$NIK','$nama','$jenis_kel','$tempat_lahir','$tgl_lahir','$kewarganegaraan','$agama','$status','$pendidikan_ter','$alamat','$pekerjaan','$RT','$RW')");
        return $hasil;
    }

    function get_pen(){

        $data = $this->db->get('penduduk');

        return $data->num_rows();
    }
    public function select_by_peng($id) {
    $sql = "SELECT COUNT(*) AS jml FROM penduduk WHERE NIK = {$id}";

    $data = $this->db->query($sql);

    return $data->row();
  }
}