<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'application/controllers/auth/DefaultController.php';

class PengajuanCon extends DefaultController
{

    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }

    public function index()
    {
        $data['data_kategori'] = $this->get_kategori();
        $data['data_pengajuan'] = $this->get_pengajuan();
        $data['data_dinas'] = $this->get_dinas();

        $this->load->view('users/page/pengajuan', $data);
    }

    private function get_dinas()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->order_by("id", "asc");
        return $this->db->get('tb_dinas')->result();
    }

    private function get_kategori()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->order_by("id", "asc");
        return $this->db->get('master_keperluan')->result();
    }

    private function get_pengajuan()
    {
        $this->load->database();
        $this->db->select('*');
        if ($this->session->userdata('role') != 1) {
            $this->db->where('id_user', $this->session->userdata('userid'));
        }
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

    public function insertData()
    {
        $this->load->database();

        $status = "";
        $msg = "";
        $file_element_name = 'file_gambar';
        $imgpath = "";
        $invoice_id=substr(sha1(time()), 0, 8);

        $config['upload_path'] = './upload_file/gambar_file/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = false;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!isset($_FILES[$file_element_name])) {
            $data = $this->upload->data();
            $c = base_url();
            $a = 'upload_file/gambar_file/';
            $b = $data['file_name'];
            $imgpath = null;
            
            if($this->check_invoice($invoice_id)>0){
                $invoice_id=substr(sha1(time()), 0, 8);
            } 

            $data = array(
                'id_user' => $this->session->userdata("userid"),
                'judul_penelitian' => $this->input->post("judul_penelitian"),
                'mulai_penelitian' => $this->input->post("mulai_penelitian"),
                'selesai_penelitian' => $this->input->post("selesai_penelitian"),
                'perihal' => $this->input->post("perihal"),
                'id_kategori' => $this->input->post("id_kategori"),
                'nama_pejabat' => $this->input->post("nama_pejabat"),
                'no_surat' => $this->input->post("no_surat"),
                'status_pemohon' => $this->input->post("status_pemohon"),
                'no_wa' => $this->input->post("no_wa"),
                'lokasi' => $this->input->post("lokasi"),
                'alamat' => $this->input->post("alamat"),
                'invoiceid' => $invoice_id,
                'lama_kegiatan' => $this->input->post("lama_kegiatan"),
                'jumlah_anggota' => $this->input->post("jumlah_anggota"),
                'upload_file' => $imgpath,
            );

            $doupload = $this->db->insert('pengajuan', $data);

            if ($doupload) {
                $status = "success";
                $msg = "File successfully uploaded";
            } else {
                unlink($data['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
            }
        } else {
            $config['upload_path'] = './upload_file/gambar_file/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = false;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();
                $c = base_url();
                $a = 'upload_file/gambar_file/';
                $b = $data['file_name'];
                $imgpath = $a . $b;

                if($this->check_invoice($invoice_id)>0){
                    $invoice_id=substr(sha1(time()), 0, 8);
                } 

                $data = array(
                    'id_user' => $this->session->userdata("userid"),
                    'judul_penelitian' => $this->input->post("judul_penelitian"),
                    'mulai_penelitian' => $this->input->post("mulai_penelitian"),
                    'selesai_penelitian' => $this->input->post("selesai_penelitian"),
                    'perihal' => $this->input->post("perihal"),
                    'id_kategori' => $this->input->post("id_kategori"),
                    'nama_pejabat' => $this->input->post("nama_pejabat"),
                    'no_surat' => $this->input->post("no_surat"),
                    'status_pemohon' => $this->input->post("status_pemohon"),
                    'no_wa' => $this->input->post("no_wa"),
                    'lokasi' => $this->input->post("lokasi"),
                    'alamat' => $this->input->post("alamat"),
                    'invoiceid' => $invoice_id,
                    'lama_kegiatan' => $this->input->post("lama_kegiatan"),
                    'jumlah_anggota' => $this->input->post("jumlah_anggota"),
                    'upload_file' => $imgpath,
                );

                $doupload = $this->db->insert('pengajuan', $data);

                if ($doupload) {
                    $status = "success";
                    $msg = "File successfully uploaded";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    private function check_invoice($invoiceid){
        $this->load->database();
        $this->db->select('id');
        $this->db->from('pengajuan');
        $this->db->where('invoiceid', $invoiceid);
        $q = $this->db->get()->num_rows();
        return $q;
    }
    public function getById($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id', $id);
        $q = $this->db->get();
        $data['data'] = $q->result();

        echo json_encode($data);
    }

    public function editData()
    {
        $this->load->database();

        $status = "";
        $msg = "";
        $file_element_name = 'file_gambar';
        $imgpath = "";

        $config['upload_path'] = './upload_file/gambar_file/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = false;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!isset($_FILES[$file_element_name])) {
            $data = $this->upload->data();
            $where = array(
                'id' => $this->input->post('id_edit'));

            $data = array(
                'id_user' => $this->session->userdata("userid"),
                'judul_penelitian' => $this->input->post("judul_penelitian"),
                'mulai_penelitian' => $this->input->post("mulai_penelitian"),
                'selesai_penelitian' => $this->input->post("selesai_penelitian"),
                'perihal' => $this->input->post("perihal"),
                'id_kategori' => $this->input->post("id_kategori"),
                'nama_pejabat' => $this->input->post("nama_pejabat"),
                'no_surat' => $this->input->post("no_surat"),
                'status_pemohon' => $this->input->post("status_pemohon"),
                'no_wa' => $this->input->post("no_wa"),
                'lokasi' => $this->input->post("lokasi"),
                'alamat' => $this->input->post("alamat"),
                'lama_kegiatan' => $this->input->post("lama_kegiatan"),
                'jumlah_anggota' => $this->input->post("jumlah_anggota"),
            );

            $this->db->where($where);
            $doupload = $this->db->update('pengajuan', $data);

            if ($doupload) {
                $status = "success";
                $msg = "File successfully uploaded";
            } else {
                unlink($data['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
            }
        } else {
            $config['upload_path'] = './upload_file/gambar_file/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();
                $c = base_url();
                $a = 'upload_file/gambar_file/';
                $b = $data['file_name'];
                $imgpath = $a . $b;

                $where = array(
                    'id' => $this->input->post('id_edit'));

                $data = array(
                    'id_user' => $this->session->userdata("userid"),
                    'judul_penelitian' => $this->input->post("judul_penelitian"),
                    'mulai_penelitian' => $this->input->post("mulai_penelitian"),
                    'selesai_penelitian' => $this->input->post("selesai_penelitian"),
                    'perihal' => $this->input->post("perihal"),
                    'id_kategori' => $this->input->post("id_kategori"),
                    'nama_pejabat' => $this->input->post("nama_pejabat"),
                    'no_surat' => $this->input->post("no_surat"),
                    'status_pemohon' => $this->input->post("status_pemohon"),
                    'no_wa' => $this->input->post("no_wa"),
                    'lokasi' => $this->input->post("lokasi"),
                    'alamat' => $this->input->post("alamat"),
                    'lama_kegiatan' => $this->input->post("lama_kegiatan"),
                    'jumlah_anggota' => $this->input->post("jumlah_anggota"),
                    'upload_file' => $imgpath,
                );

                $this->db->where($where);
                $doupload = $this->db->update('pengajuan', $data);

                if ($doupload) {
                    $status = "success";
                    $msg = "File successfully uploaded";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function delete($id)
    {
        $this->load->database();
        $status = "";
        $msg = "";

        $where = array(
            'id' => $_POST['id']);

        $this->db->where('id', $id);
        $delete_rr = $this->db->delete('pengajuan');

        if ($delete_rr == true) {
            $status = "success";
            $msg = "Success Delete";
        } else {
            $status = "error";
            $msg = "Error Delete";
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function update_approve($id)
    {
        $this->load->database();
        $status = "";
        $msg = "";

        $where = array(
            'id' => $this->input->post('id'));

        $data = array(
            'isApproved' => $this->input->post("isApproved"),
        );

        $this->db->where($where);
        $doupload = $this->db->update('pengajuan', $data);

        if ($doupload == true) {
            $status = "success";
            $msg = "Success Approved";
        } else {
            $status = "error";
            $msg = "Error";
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function getByIdNgeprint($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id', $id);
        $q = $this->db->get()->row();

        $data['id'] = $q->id;
        $data['judul_penelitian'] = $q->judul_penelitian;
        $data['mulai_penelitian'] = $q->mulai_penelitian;
        $data['selesai_penelitian'] = $q->selesai_penelitian;
        $data['upload_file'] = $q->upload_file;
        $data['id_kategori'] = help_nama_kategori($q->id_kategori);
        $data['id_user'] = help_nama_user($q->id_user);
        $data['nama_pejabat'] = $q->nama_pejabat;
        $data['no_surat'] = $q->no_surat;
        $data['status_pemohon'] = $q->status_pemohon;
        $data['no_wa'] = $q->no_wa;
        $data['lokasi'] = $q->lokasi;
        $data['alamat'] = $q->alamat;
        $data['lama_kegiatan'] = $q->lama_kegiatan;
        $data['jumlah_anggota'] = $q->jumlah_anggota;
        $data['perihal'] = $q->perihal;
        $data['isApproved'] = $q->isApproved;

        echo json_encode($data);
    }

}