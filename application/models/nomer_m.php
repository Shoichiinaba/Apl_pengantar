<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class nomer_m extends CI_Model {
    	//var $db;
    	//var $table = "pengantar";
    	function __construct()
	{
		parent::__construct();
	}

    public function PNTR(){ 
    	
    	$this->db->SELECT('RIGHT(pengantar.no_pengantar,4) as kode', FALSE);
    	$this->db->order_by('no_pengantar','DESC');
    	$this->db->limit(1);

    	$query_ = $this->db->get('pengantar');
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
    	$kode_jadi = "PNTR-".$tahun.'-'.$kode_max_;
    	return $kode_jadi;
    }	
}