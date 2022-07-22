<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;

class Word extends CI_Controller
{

    public function print_pengajuan()
    {
        $get_data = $this->ambil_data($this->input->post('id_download'));

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate('template.docx');

        $template->setValue('nama', help_nama_user($get_data->id_user));
        $template->setValue('id_kategori', help_nama_kategori($get_data->id_user));
        $template->setValue('status', $get_data->status_pemohon);
        $template->setValue('judul_penelitian', $get_data->judul_penelitian);
        $template->setValue('mulai_penelitian', $get_data->mulai_penelitian);
        $template->setValue('selesai_penelitian', $get_data->selesai_penelitian);
        $template->setValue('nama_pejabat', $get_data->nama_pejabat);
        $template->setValue('no_surat', $get_data->no_surat);
        $template->setValue('alamat', $get_data->alamat);
        $template->setValue('no_wa', $get_data->no_wa);
        $template->setValue('lokasi_kegiatan', $get_data->lokasi_kegiatan);
        $template->setValue('lama_kegiatan', $get_data->lama_kegiatan);

        $template->setValue('id_dinas1', $get_data->id_dinas1);
        $template->setValue('id_dinas2', $get_data->id_dinas2);
        $template->setValue('id_dinas3', $get_data->id_dinas3);
        $template->setValue('id_dinas4', $get_data->id_dinas4);
        $template->setValue('id_dinas5', $get_data->id_dinas5);
        $template->setValue('id_dinas6', $get_data->id_dinas6);

        $temp_filename = 'surat-kerja-praktek.docx';
        $template->saveAs($temp_filename);
        echo json_encode($temp_filename);

        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // header('Content-Disposition: attachment; filename='.$temp_filename);
        // header('Content-Transfer-Encoding: binary');
        // header('Expires: 0');
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        // header('Pragma: public');
        // header('Content-Length: ' . filesize($temp_filename));
        // flush();
        // readfile($temp_filename);
        // unlink($temp_filename);
        // exit;
    }

    private function ambil_data($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id', $id);
        $q = $this->db->get()->row();
        return $q;
    }
}