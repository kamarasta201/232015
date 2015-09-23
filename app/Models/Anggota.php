<?php
namespace Models;
use Resources;

class Anggota extends Resources\ActiveRecord {
    public function __construct(){
    	call_user_func_array( 'parent::__construct', func_get_args() );
        $this->table = 'anggota';
    }
    public function GetAnggota(){
	 	Return $this->db->results("SELECT * FROM anggota ORDER BY id");
	}
	public function GetapproveAnggota($wilayah){
	 	Return $this->db->results("SELECT * FROM anggota WHERE verifikasi = '".$wilayah."'");
	}
}