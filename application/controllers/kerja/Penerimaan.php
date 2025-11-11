  <?php
  // Final Version of Penerimaan Liquid Oxygen !
  defined('BASEPATH') or exit('No direct script access allowed');

  class Penerimaan extends Admin_Controller {
    // Define Penerimaan Gas Medis Liquid Oxygen
    protected $role;
    // Parent Class Construct & Role & Variable
    public function __construct(){
      parent::__construct();
      $this->role = 'kontrak';
      $this->load->model(array('kerja_model'));
    }

    public function index(){
      // Tabel History Penerimaan Gas Medis (Liquid Oxygen)
      if (!get_permission($this->role, 'is_view')){
        access_denied();
      }
      // File Result
      $this->data['result'] = $this->kerja_model->TabelDeliver();
      // File Config
      $this->data['title'] = 'Tabel Penerimaan Liquid Oxygen';
      $this->data['sub_page'] = 'kerja/penerimaan/index';
      $this->data['main_menu'] = 'kerja';
      $this->load->view('layout/index', $this->data);
    }

    public function insert(){
      // Formulir Input Penerimaan Gas Medis (I)
      if (!get_permission($this->role, 'is_add')){
        access_denied();
      }
      // File Config
      $this->data['title'] = 'Formulir Input Penerimaan Liquid Oxygen';
      $this->data['sub_page'] = 'kerja/penerimaan/insert';
      $this->data['main_menu'] = 'kerja';
      $this->load->view('layout/index', $this->data);
    }

    public function publish(){
      // Publish Data Penerimaan Pada Tabel Penerimaan Liquid
      if (!get_permission($this->role, 'is_add')){
        access_denied();
      }
      // Auto Start Transaction
      $this->db->trans_start();
      // Publish
      $this->kerja_model->PublishDeliver($this->input->post());
      // Auto Complete
      $this->db->trans_complete();
      // Response Status
      if ($this->db->trans_status() === FALSE) {
        set_alert('error', "Penerimaan Perjanjian Kerja Sama Gagal !");
      } else {
        set_alert('success', "Penerimaan Perjanjian Kerja Sama Berhasil !");
      }
      redirect(base_url('kerja/penerimaan'));
    }

    public function detail($uuid){
      // Detail Formulir Input Penerimaan Gas Medis (I)
      if (!get_permission($this->role, 'is_view')){
        access_denied();
      }
      // File Result
      
      // File Config
      $this->data['title'] = 'Detail Input Penerimaan Liquid Oxygen';
      $this->data['sub_page'] = 'kerja/penerimaan/detail';
      $this->data['main_menu'] = 'kerja';
      $this->load->view('layout/index', $this->data);
    }
  }
  ?>