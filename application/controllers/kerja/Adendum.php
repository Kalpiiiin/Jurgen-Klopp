<?php
// Final Version of Revisi Perjanjian Kerja Sama Controller !
defined('BASEPATH') or exit('No direct script access allowed');

class Adendum extends MY_Controller {
  // Define Revisi Perjanjian Kerja Sama (Adendum) Controller
  protected $role;
  // Parent Class Construct & Role & Variable
  public function __construct(){
    parent::__construct();
    $this->role = 'kontrak';
    $this->load->model(array('kerja_model'));
  }

  public function index(){
    // Function to Handle Adendum Table
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->GlobalRevisi();
    // File Config
    $this->data['title'] = 'Tabel Adendum Seluruh Perjanjian Kerja Sama Gas Medis';
    $this->data['sub_page'] = 'kerja/adendum/index';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function insert($uuid){
    // Function to Handle Insert on Perubahan Perjanjian Kerja Sama
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // File Result
    $this->data['content'] = $this->kerja_model->DetailKerja($uuid);
    // File Config
    $this->data['title'] = 'Tabel Adendum Seluruh Perjanjian Kerja Sama Gas Medis';
    $this->data['sub_page'] = 'kerja/adendum/insert';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function publish(){
    // Function to Publish Any Revisi on Perjanjian Kerja Sama
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // Variable
    $data = $this->input->post();
    // Auto Start Transaction
    $this->db->trans_start();
    // Publish Meta Data
    $uuid = $this->kerja_model->PublishRevisi($data['user'], $data['tanggal'], $data['serial'], $data['alasan']);
    // Publish Revisi Detail
    $this->kerja_model->PublishDetail($uuid, $data['serial']);
    // Publish Revisi on Tabel Kerja Sama (Define Variable)
    $inputs = array(
      "uuid" => $data['serial'], 
      "judul" => $data["judul"],
      "tanggal_mulai" => $data["tanggal_mulai"], 
      "tanggal_selesai" => $data["tanggal_selesai"],
      "harga_satuan" => $data["harga_satuan"]
    );
    // Publish Revisi on Tabel Kerja Sama (Publish Kerja)
    $this->kerja_model->PublishKerja($inputs);
    // Auto Complete
    $this->db->trans_complete();
    // Response Status
    if ($this->db->trans_status() === FALSE) {
      set_alert('error', "Revisi Perjanjian Kerja Sama Gagal !");
    } else {
      set_alert('success', "Revisi Perjanjian Kerja Sama Berhasil !");
    }
    redirect(base_url('kerja/adendum'));
  }

  public function detail($uuid){
    // Controller to Detail on What Happen on Revisi
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // Variable
    $primera = $this->kerja_model->DetailRevisi($uuid);
    // File Result
    $this->data['primer'] = $primera;
    // File Result Value (Older)
    $this->data['olders'] = $this->kerja_model->DetailKerja($primera[0]['kontrak_identifier']);
    // File Result Value
    $this->data['result'] = $this->kerja_model->DetailRevisiContent($uuid);
    // File Config
    $this->data['title'] = 'Tabel Detail Revisi';
    $this->data['sub_page'] = 'kerja/adendum/detail';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }
}
?>