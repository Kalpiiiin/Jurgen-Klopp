<?php
// ?

class Order extends Admin_Controller {
  // ?
  protected $role;
  // Parent Class Construct & Role & Variable
  public function __construct(){
    parent::__construct();
    $this->role = 'kontrak';
    $this->load->model(array('kerja_model'));
  }

  public function index(){
    // Controller to Control Primary Table of Order (Perjanjian Kerja Sama)
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->TabelOrder();
    // File
    $this->data['title'] = 'Tabel Pesanan Liquid Oxygen';
    $this->data['sub_page'] = 'kerja/order/index';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function insert(){
    // Controlller to Handle Formulir of Order (Perjanjian Kerja Sama)
    if (!get_permission($this->role, 'is_add')){
      access_denied();
    }
    // File
    $this->data['title'] = 'Input Permintaan Perjanjian Kerja Sama';
    $this->data['sub_page'] = 'kerja/order/insert';
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
    $this->kerja_model->PublishOrder($this->input->post());
    // Auto Complete
    $this->db->trans_complete();
    // Response Status
    if ($this->db->trans_status() === FALSE) {
      set_alert('error', "Penulisan Order Liquid Oxygen Gagal !");
    } else {
      set_alert('success', "Penulisan Order Liquid Oxygen Berhasil !");
    }
    redirect(base_url('kerja/order/'));
  }

  public function detail(){
    // ?
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Result
    $this->data['result'] = $this->kerja_model->DetailOrder($uuid);
    // File Config
    $this->data['title'] = 'Detail Pesanan Liquid Oxygen';
    $this->data['sub_page'] = 'kerja/order/detail';
    $this->data['main_menu'] = 'kerja';
    $this->load->view('layout/index', $this->data);
  }

  public function OrderOnly(){
    // uuid, kontrak_identifier, surat_identifier, kuantitas
  }
}
?>