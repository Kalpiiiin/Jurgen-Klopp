<?php
// Medical Gases Controller is Mandatory to Start Konsolidasi
// Specially on GasesOnly

class Gases extends Admin_Controller {
  // Define Master Medical Gases Controller
  protected $role;
  public function __construct(){
    parent::__construct();
    $this->role = 'ipsrs';
    $this->load->model(array('master_model'));
  }

  public function index(){
    // Controller to Control Main File of Master Medical Gases
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File
    $this->data['title'] = 'Tabel Master Gas Medis';
    $this->data['sub_page'] = 'gases/index';
    $this->data['main_menu'] = 'gases';
    $this->load->view('layout/index', $this->data);
  }

  public function tabular(){
    // Controller to Support Main File on Table Result
    $filter = ['deleted_at' => NULL]; 
    $column = 'id, gases, unit, stock';
    // Retrieve All Available Result on Filter
    $datatables = $this->master_model->GlobalSelect('tabel_gases', $column, true, $filter);
    $datatables = json_decode($datatables, true);
    $datatables = $datatables['data'];
    $gases_array = array();
    $datarow = 1;
    // Data Table Validation
    if (!empty($datatables)){
      // Single Value
      foreach($datatables as $key => $value){
        // Define Detail Variable
        $detail = '';
        if (get_permission($this->role, 'is_view') || get_permission($this->role, 'is_edit')) {
          // Detail & Update Gases
          $detail .= '<button class="btn btn-circle icon btn-primary" id="edit_gases" name="edit_gases" data_edit_gases="' . $value['id'] . '"><i class="fas fa-pen"></i></button>';
        }
        // Define Delete Variable
        $delete = '';
        if (get_permission($this->role, 'is_delete')) {
          // Delete Gases
					$delete .= btn_delete('gases/delete/' . $value['id']);
        }
        // Insert to Array
        $row = array();
        $row[] = $datarow;
        $row[] = $value['gases'];
        $row[] = number_format($value['stock']);
        $row[] = $value["unit"];
        $row[] = $detail.' '.$delete;
        $gases_array[] = $row;
        $datarow += 1;
      }
    }
    // Initiate JSON Result
    $json_data = array(
      "draw" => intval($datatables->draw),
      "recordsTotal" => intval($datatables->recordsTotal),
      "recordsFiltered" => intval($datatables->recordsFiltered),
      "data" => $gases_array,
    );
    // Return JSON
    echo json_encode($json_data);
  }

  public function publish(){
    // Controller to Handle Insert & Update on Medical Gases
    if (!get_permission($this->role, 'is_add') && !get_permission($this->role, 'is_edit')) {
      access_denied();
    }
    // Variable Post
    $posts = $this->input->post();
    // Validate Against Column
    $column = ['id', 'gases', 'unit', 'stock']; 
    $inputs = array_intersect_key($posts, array_flip($column));
		$result = $this->master_model->InsertUpdateData('tabel_gases', $inputs, 'id');
    // Select Output
    if ($result) {
      $response = array('status' => 'success', 'message' => 'Proses Berhasil !');
    } else {
      $response = array('status' => 'error', 'message' => 'Proses Gagal !');
    }
    // Return Result
    echo json_encode($response);
  }
  
  public function detail(){
    // Controller to Retrieve Certain Medical Gases
    if (!get_permission($this->role, 'is_view')) {
      access_denied();
    }
    // Medical Gases Identifier
    $id = $this->input->post('data_edit_gases');
    // Define Table Variable
    $column = 'id, gases, unit, stock';
    $result = $this->master_model->GlobalSelect('tabel_gases', $column, false, ['id' => $id]);
    // Return Result
    echo json_encode($result);
  }

  public function delete(){
    // Controller to Perform Soft Delete on Medical Gases Table
    if (!get_permission($this->role, 'is_delete')){
      access_denied();
    }
    // Define Multi Variable to Soft Delete
    $time = date('Y-m-d H:i:s');
    $user = html_escape($this->session->userdata('name'));
    $inputs = ['deleted_at' => $time, 'deleted_by' => $user];
    // Delete the Data on Model
    $this->master_model->DeleteData('tabel_gases', 'id', $id, $inputs);
  }

  public function GasesOnly(){
    // Controller to Support Konsolidasi & Pengeluaran
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    $column = "id, gases, stock";
    $gases = $this->master_model->GlobalSelect("tabel_gases", $column, false, ['deleted_at' => NULL]);
    $result = array();
    foreach ($gases as $value) {
      $result[] = array("id" => $value['id'], "text" => $value['gases'], "jumlah" => $value["stock"]);
    }
    echo json_encode($result);
  }
}
?>