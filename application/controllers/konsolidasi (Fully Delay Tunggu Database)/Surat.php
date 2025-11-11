<?php
// Konsolidasi 2 is All About Yearly Order & Est

class Surat extends Admin_Controller {
  // Define Konsolidasi Yearly Order with Est
  protected $role;
  public function __construct(){
    parent::__construct();
    $this->role = 'kontrak';
    $this->load->model(array('konsolidasi_model'));
  }

  public function index(){
    // Controller to Control Primary Table of Yearly Order
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->konsolidasi_model->YearlyTable();
    // File
    $this->data['title'] = 'Tabel Perjanjian Konsolidasi Tahunan';
    $this->data['sub_page'] = 'konsolidasi/surat/index';
    $this->data['main_menu'] = 'konsolidasi';
    $this->load->view('layout/index', $this->data);
  }

  public function insert($uuid){
    // Controlller to Handle Formulir of Yearly Order
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // File Result
    // Content Heavily Relate to Identifier While Meta Data Stay Unavailable (Yet)
    $this->data['content'] = $this->konsolidasi_model->YearlyResult($uuid);
    // File
    $this->data['title'] = 'Input Surat Pesanan Konsolidasi';
    $this->data['sub_page'] = 'konsolidasi/surat/insert';
    $this->data['main_menu'] = 'konsolidasi';
    $this->load->view('layout/index', $this->data);
  }

  public function publish(){
    // Controller to Control Data Publish on Yearly Order
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // Define Multi Variable
    // ?
    // Auto Start Transaction
    $this->db->trans_start();
    // Primary Table Publish
    $this->konsolidasi_model->YearlyOrderPublish();
    // Konsolidasi Input Content
    $this->konsolidasi_model->PublishDetail($uuid);
    // Auto Complete
    $this->db->trans_complete();
    // Response Status
    if ($this->db->trans_status() === FALSE) {
      set_alert('error', "Penulisan Perjanjian Konsolidasi Gagal !");
    } else {
      set_alert('success', "Penulisan Perjanjian Konsolidasi Berhasil !");
    }
    redirect(base_url('konsolidasi/surat'));
  }
}
?>