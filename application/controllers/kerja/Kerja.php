<?php
// Final Version of Perjanjian Kerja Sama Controller !
defined('BASEPATH') or exit('No direct script access allowed');

class Kerja extends Admin_Controller {
  // Define Perjanjian Kerja Sama Init Controller
  protected $role;
  // Parent Class Construct & Role & Variable
  public function __construct(){
    parent::__construct();
    $this->role = 'kontrak';
    $this->load->model(array('kerja_model'));
  }

  public function index(){
    // Function to Handle All Perjanjian Kerja Sama
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->GlobalKerja();
    // File Config
    $this->data['title'] = 'Tabel Perjanjian Kerja Sama Gas Medis';
    $this->data['sub_page'] = 'kerja/kerja/index';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function insert(){
    // Function to Handle Perjanjian Kerja Sama Initiation
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // File Config
    $this->data['title'] = 'Input Pembuatan Perjanjian Kerja Sama';
    $this->data['sub_page'] = 'kerja/kerja/insert';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function publish(){
    // Controller to Publish Data Perjanjian Kerja Sama
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // Auto Start Transaction
    $this->db->trans_start();
    // Publish
    $this->kerja_model->PublishKerja($this->input->post());
    // Auto Complete
    $this->db->trans_complete();
    // Response Status
    if ($this->db->trans_status() === FALSE) {
      set_alert('error', "Penulisan Perjanjian Kerja Sama Gagal !");
    } else {
      set_alert('success', "Penulisan Perjanjian Kerja Sama Berhasil !");
    }
    redirect(base_url('kerja/kerja'));
  }

  public function detail($uuid){
    // Controller to Update Data on Perjanjian Kerja Sama
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->DetailKerja($uuid);
    // File Config
    $this->data['title'] = 'Detail Perjanjian Kerja Sama';
    $this->data['sub_page'] = 'kerja/kerja/detail';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function report($uuid){
    // Controller on Final Report of Perjanjian Kerja Sama
    if (!get_permission($this->role, 'is_edit')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->DetailResult($uuid);
    // File Config
    $this->data['title'] = 'Hasil Perjanjian Kerja Sama';
    $this->data['sub_page'] = 'kerja/kerja/report';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function KerjaOnly(){
    // Return Available Perjanjian Kerja Sama to Help Surat Pesanan & Kebutuhan Revisi
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // Value Kerja Only
    $inputs = $this->kerja_model->KerjaOnly();
    // Return Result
    echo json_encode($inputs);
  }
}
?>