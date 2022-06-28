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
        $data['data_kategori'] = $this->get_kategori();
        $data['data_izin'] = $this->get_izin();
        $this->load->view('users/page/pengajuan',$data);
    }

    private function get_kategori(){
        $this->load->database();
        $this->db->select('*');
        $this->db->order_by("id", "asc");
        return $this->db->get('master_keperluan')->result();
    }

    private function get_izin(){
        $this->load->database();
        $this->db->select('*');
        $this->db->order_by("id", "asc");
        return $this->db->get('pengajuan')->result();
    }

    // private function get_izin(){
    //     $this->load->database();
    //     $this->db->select('pengajuan.id as id, pengajuan.judul_penelitian as judul_penelitian, pengajuan.mulai_penelitian as mulai_penelitian, pengajuan.selesai_penelitian as selesai_penelitian, pengajuan.keterangan as keterangan, master_keperluan.kategori as kategori');
    //     $this->db->join('master_keperluan', 'pengajuan.id_kategori = master_keperluan.id');
    //     $this->db->order_by("pengajuan.id", "asc");
    //     return $this->db->get('pengajuan')->result();
    // }

}

?>