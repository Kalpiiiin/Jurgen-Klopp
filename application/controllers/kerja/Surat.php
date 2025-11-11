<?php
// ?

class Surat extends Admin_Controller {
  // ?
  protected $role;
  // Parent Class Construct & Role & Variable
  public function __construct(){
    parent::__construct();
    $this->role = 'kontrak';
    $this->load->model(array('kerja_model'));
  }

  public function index(){
    // Controller to Control Primary Table of Yearly Order (Perjanjian Kerja Sama)
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->YearlyTable();
    // File
    $this->data['title'] = 'Tabel Pemesanan Perjanjian Kerja Sama Tahunan';
    $this->data['sub_page'] = 'kerja/surat/index';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function insert($uuid){
    // Controlller to Handle Formulir of Yearly Order (Perjanjian Kerja Sama)
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // File
    $this->data['title'] = 'Input Surat Pesanan Perjanjian Kerja Sama';
    $this->data['sub_page'] = 'kerja/surat/insert';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function publish(){
    // ?
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // Auto Start Transaction
    $this->db->trans_start();
    // Publish
    $this->kerja_model->PublishYearly($this->input->post());
    // Auto Complete
    $this->db->trans_complete();
    // Response Status
    if ($this->db->trans_status() === FALSE) {
      set_alert('error', "Penulisan Pesanan Perjanjian Kerja Sama Gagal !");
    } else {
      set_alert('success', "Penulisan Pesanan Perjanjian Kerja Sama Berhasil !");
    }
    redirect(base_url('kerja/surat/'));
  }

  public function detail(){
    // ?
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->DetailYearly($uuid);
    // File Config
    $this->data['title'] = 'Detail Surat Pesanan Pertahun';
    $this->data['sub_page'] = 'kerja/surat/detail';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }
}
?>