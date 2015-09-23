<?php
namespace Controllers;
use Resources, Models;

class Home extends Resources\Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->request = new Resources\Request;
        
    }

    public function index()
    {
    	
        $data['title'] = 'Pendaftaran Anggota';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            
            $nama = $this->request->post('nama');
            $verifikasi = $this->request->post('verifikasi');  
            $anggota = new Models\Anggota;
            $anggota->nama = $nama;
            $anggota->verifikasi = $verifikasi;
            $anggota->status = 'new';
            $anggota->save();
            $this->redirect('');
        }
        else {
            $this->output('home', $data);
        }        
    }
}
