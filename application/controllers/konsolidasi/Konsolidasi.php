<?php
// Konsolidasi 1 is Primary Controller to Create Perjanjian Konsolidasi
// Konsolidasi 1 is Heavily Relate to Entire Konsolidasi Content on the Same Folder
// Konsolidasi is Also Heavily Relate to Master Medical Gases

class Konsolidasi extends Admin_Controller {
  // Define Konsolidasi Creation Controller
  protected $role;
  public function __construct(){
    parent::__construct();
    $this->role = 'kontrak';
    $this->load->model(array('konsolidasi_model'));
  }

  public function index(){
    // Controller to Control Main File of Konsolidasi Primary Table
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->konsolidasi_model->TabelKonsolidasi();
    // File Configuration
    $this->data['title'] = 'Tabel Perjanjian Konsolidasi';
    $this->data['sub_page'] = 'konsolidasi/konsolidasi/index';
    $this->data['main_menu'] = 'konsolidasi';
    $this->load->view('layout/index', $this->data);
  }

  public function insert(){
    // Controller to Control Konsolidasi Formulir
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // File Configuration
    $this->data['title'] = 'Input Perjanjian Konsolidasi';
    $this->data['sub_page'] = 'konsolidasi/konsolidasi/insert';
    $this->data['main_menu'] = 'konsolidasi';
    $this->load->view('layout/index', $this->data);
  }

  public function publish(){
    // Controller to Publish Input Data to Tabel Konsolidasi
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // Define Multi Variable
    // ?
    // Auto Start Transaction
    $this->db->trans_start();
    // Primary Table Publish
    $uuid = $this->konsolidasi_model->PublishKonsolidasi();
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
    redirect(base_url('konsolidasi/konsolidasi'));
  }

  public function detail($uuid){
    // Controller to Retrieve Detail on Certain Perjanjian Konsolidasi
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result (1)
    $this->data['primary'] = $this->konsolidasi_model->DetailKonsole($uuid);
    // File Result (2)
    $this->data['content'] = $this->konsolidasi_model->DetailContent($uuid);
    // File Config
    $this->data['title'] = 'Detail Perjanjian Konsolidasi';
    $this->data['sub_page'] = 'konsolidasi/konsolidasi/detail';
    $this->data['main_menu'] = 'konsolidasi';
    $this->load->view('layout/index', $this->data);
  }

  public function ConsoleOnly(){
    // Controller to Support All Konsolidasi Activity
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // Retrieve Available Konsolidasi Only
    $result = $this->konsolidasi_model->ConsoleOnly();
    // Variable & Result
    $result = array();
    // Return Result
    echo json_encode($result);
  }
}
?>