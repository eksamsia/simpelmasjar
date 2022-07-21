<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Word extends CI_Controller {


	public function print_pengajuan()
	{
        $get_data= $this->ambil_data($this->input->post('id_download'));

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate('template.docx');

        $template->setValue('nama', help_nama_user($get_data->id_user));
        $template->setValue('status', $get_data->status_pemohon);
        $template->setValue('alamat', $get_data->alamat);

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

    private function ambil_data($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id', $id);
        $q = $this->db->get()->row();
        return $q;
    }
}