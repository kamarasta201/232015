<?php
namespace Controllers;
use Resources, Models;

class User extends Resources\Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->session = new Resources\Session;
        $this->post    = new Resources\Request;
        $this->users   = new Models\User;
        
    }
    public function index(){
        //cek dulu ya sudah login belum?
        $ceklogin=$this->session->getValue('logadmin');
        if($ceklogin){
           //kalau sudah login sih masuk aja ke dashboard
           $this->redirect('dashboard');
        }else{
           //kalau belum login, maaf ya login dulu di from.
           echo 'gagal login';
        }
    }

    public function login()
    {
    	
        $data['title'] = 'Pendaftaran Anggota';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {            
           $username=$this->post->POST('username',FILTER_SANITIZE_MAGIC_QUOTES);
           $password=$this->post->POST('password',FILTER_SANITIZE_MAGIC_QUOTES);
           $hslcek=$this->users->getByusername($username);
           if($hslcek){
               //sudah benar - buatkan session - langsung ke dashboard
               if(MD5($password)==$hslcek->password){
                 $this->session->setValue(
                            array(
                                 'logadmin' => true,
                                 'username' => $hslcek->username,
                                 'wilayah' => $hslcek->wilayah
                                )
                          );
                 $this->redirect('../../user');
               }else{
                 $salah="Maaf! Password salah";
                 echo $salah;
               }
           }else{                 
                 $salah="Maaf! Username salah";
                 echo $salah;
           }
        }
        else {
            $this->output('home', $data);
        }        
    }
}
