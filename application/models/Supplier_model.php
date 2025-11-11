<?php
// Supplier Model = Supplier Controller

class Supplier_model extends Admin_Controller {
  // Define Supplier Model
  public function __construct(){
    parent::__construct();
    $this->load->library('datatables');
  }

  public function TableSupplier(){
    // Tabel Supplier Model to Support Data Table
    $column = "uuid, name, position, company_name, mobileno, email";
    $this->datatables->select($column)->from('available_vendor');
    return $this->datatables->generate();
  }

  public function PublishSupplier($inputs){
    // Supplier Model to Publish Supplier Input Data to Table
    // Variable Identifier
    $uuid = $this->uuid->v4();
    // Input Array
    $insert_data = array(
			'uuid' => $data['uuid'],
			'name' => $data['name'],
			'position' => $data['position'],
			'company_name' => $data['company_name'],
			'address' => $data['address'],
			'mobileno' => $data['mobileno'],
			'email' => $data['email'],
			'bank_acc' => $data['bank_acc'],
			'jenis_usaha_id' => $data['jenis_usaha_id'],
			'bank_id' => $data['bank_id']
    );
    // Split Insert & Update Module on Availability of Id (Update Module)
    if (isset($data['uuid']) && !empty($data['uuid'])) {
      $insert_data['updated_at'] = date("Y-m-d H:i:s");
			$insert_data['updated_by'] = html_escape($this->session->userdata('name'));
			$this->db->update('kontrak_penyedia', $insert_data, ['uuid' => $data['uuid']]);
    } else {
      // Split Insert & Update Module on Availability of Id (Insert Module)
      $insert_data['uuid'] = $uuid;
			$insert_data['is_active'] = 1;
			$insert_data['created_at'] = date("Y-m-d H:i:s");
			$insert_data['created_by'] = html_escape($this->session->userdata('name'));
			$this->db->insert('kontrak_penyedia', $insert_data);
    }
    // Return Result
    return $uuid;
  }

  public function SupplierDetail($uuid){
    // Deliver Certain Data of Supplier on Certain Id
    $this->db->from('available_vendor')->where('uuid', $uuid);
    // Return Single Array
    return $this->db->get()->row_array();
  }

  public function DeleteSupplier($uuid){
    // Soft Delete on Certain Supplier Data
    if (!isset($uuid) || empty($uuid)) {
      return false;
    }
    // Soft Delete Variable
    $data = array(
      'is_active' => 0,
      'deleted_at' => date("Y-m-d H:i:s"),
      'deleted_by' => html_escape($this->session->userdata('name'))
    );
    // Return True or False Result
    return $this->db->update('kontrak_penyedia', $data, ['uuid' => $data['uuid']]);
  }

  public function SupplierOnly(){
    // All of Available Supplier to Initiate Kontrak
    $column = "id, company_name";
    $sqlquery = "SELECT $column FROM kontrak_penyedia WHERE is_active = ?";
    $query = $this->db->query($sqlquery, [1]);
    return $query->result();
  }
}
?>