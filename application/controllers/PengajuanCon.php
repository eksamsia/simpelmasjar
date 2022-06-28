<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class PengajuanCon extends DefaultController { 

    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }

    public function index()
    {
        $data['data_rr'] = $this->get_rr();
        $this->load->view('users/page/pengajuan',$data);
    }

    private function get_rr(){
        $this->load->database();
        $this->db->select('*');
        $this->db->order_by("id", "asc");
        return $this->db->get('master_ruang')->result();
    }

}

?>