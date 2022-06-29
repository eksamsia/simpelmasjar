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

    public function insertData()
    {
        $this->load->database();

        $status = "";
        $msg = "";
        $file_element_name = 'file_gambar';
        $imgpath = "";

        $config['upload_path'] = './upload_file/gambar_file/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        $this->load->library('upload',$config);

        if(!isset($_FILES[$file_element_name]))
        {
            $data = $this->upload->data();
            $c = base_url();
            $a = 'upload_file/gambar_file/';
            $b = $data['file_name'];
            $imgpath = null;
            
            $data = array(
                'id_user'    => $this->session->userdata("userid"),
                'judul_penelitian'    => $this->input->post("judul_penelitian"),
                'mulai_penelitian'    => $this->input->post("mulai_penelitian"),
                'selesai_penelitian'    => $this->input->post("selesai_penelitian"),
                'keterangan'    => $this->input->post("keterangan"),
                'id_kategori'    => $this->input->post("kategori"),
                'upload_file'    => $imgpath
            );

            $doupload = $this->db->insert('pengajuan',$data);

            if($doupload)
            {
                $status = "success";
                $msg = "File successfully uploaded";
            }
            else
            {
                unlink($data['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
            }
        }
        else
        {
            $config['upload_path'] = './upload_file/gambar_file/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $c = base_url();
                $a = 'upload_file/gambar_file/';
                $b = $data['file_name'];
                $imgpath = $a.$b;
                
                $data = array(
                    'id_user'    => $this->session->userdata("userid"),
                    'judul_penelitian'    => $this->input->post("judul_penelitian"),
                    'mulai_penelitian'    => $this->input->post("mulai_penelitian"),
                    'selesai_penelitian'    => $this->input->post("selesai_penelitian"),
                    'keterangan'    => $this->input->post("keterangan"),
                    'id_kategori'    => $this->input->post("kategori"),
                    'upload_file'    => $imgpath
                );

                $doupload = $this->db->insert('pengajuan',$data);

                if($doupload)
                {
                    $status = "success";
                    $msg = "File successfully uploaded";
                }
                else
                {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function getById($id)
    {
      $this->load->database();
      $this->db->select('*');
      $this->db->from('pengajuan');
      $this->db->where('id',$id);
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
    $config['encrypt_name'] = TRUE;

    $this->upload->initialize($config);
    $this->load->library('upload',$config);

    if(!isset($_FILES[$file_element_name]))
    {
        $where = array(
            'id'  => $_POST['id']);

        $data = array(
            'judul_penelitian'    => $this->input->post("judul_penelitian"),
            'mulai_penelitian'    => $this->input->post("mulai_penelitian"),
            'selesai_penelitian'    => $this->input->post("selesai_penelitian"),
            'keterangan'    => $this->input->post("keterangan")
        );

        $this->db->where($where);
        $doupload = $this->db->update('master_ruang',$data);

        if($doupload)
        {
            $status = "success";
            $msg = "File successfully uploaded";
        }
        else
        {
            unlink($data['full_path']);
            $status = "error";
            $msg = "Something went wrong when saving the file, please try again.";
        }
    }
    else
    {
        $config['upload_path'] = './upload_file/gambar_file/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload($file_element_name))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $data = $this->upload->data();
            $c = base_url();
            $a = 'upload_file/gambar_file/';
            $b = $data['file_name'];
            $imgpath = $a.$b;

            $where = array(
                'id'  => $_POST['id']);

            $data = array(
                'nama_rr'    => $this->input->post("nama_rr"),
                'deskripsi_rr'    => $this->input->post("deskripsi_rr"),
                'filepath'    => $imgpath
            );

            $this->db->where($where);
            $doupload = $this->db->update('master_ruang',$data);

            if($doupload)
            {
                $status = "success";
                $msg = "File successfully uploaded";
            }
            else
            {
                unlink($data['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
            }
        }
        @unlink($_FILES[$file_element_name]);
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
}

}

?>