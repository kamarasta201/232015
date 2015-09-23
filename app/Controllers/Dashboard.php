<?php
namespace Controllers;
use Resources, Models;

class Dashboard extends Resources\Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->session = new Resources\Session;
        $this->request = new Resources\Request;
        $this->anggota   = new Models\Anggota;
    }

    public function index()
    {
    	$wilayah=$this->session->getValue('wilayah');
        $data['wilayah']=$wilayah;
        $data['title'] = 'Pendaftaran Anggota';
        $data['anggota']=$this->anggota->GetAnggota();
        $data['approve']=$this->anggota->GetapproveAnggota($wilayah);
        //echo 'dashboard';
        $this->output('dashboard', $data);      
    }

    public function approve($id)
    {
        $this->anggota->get($id);
        $this->anggota->status = 'approve';
        $this->anggota->save();     
        $this->redirect('../dashboard');
    }

    public function disapprove($id)
    {
        $this->anggota->get($id);
        $this->anggota->status = 'new';
        $this->anggota->save();     
        $this->redirect('../dashboard');
    }
}
