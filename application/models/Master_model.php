<?php
// Master Model = Gases Controller

class Master_model extends MY_Model {
  // Define Master Model
  public function __construct(){
    parent::__construct();
    $this->load->library('datatables');
  }

  public function GlobalSelect($table, $cols="*", $datatable=false, $filter=[], $orders=[]){
    // Get Content on Various Output, Various Column & Table
    // Table Empty ? Fail
    if (empty($table)){
      return false;
    }
    // Content
    $this->db->select($cols)->from($table);
    if (!empty($filter)) $this->db->where($filter);
    if (!empty($orders)) $this->db->order_by(key($orders), current($orders));
    // Return Content in Datatable
    if ($datatable) return $this->datatables->generate();
    // Return Result
    $query = $this->db->get();
    $total = $query->num_rows();
    return ($total == 1) ? $query->row_array() : $query->result_array();
  }

  public function InsertUpdateData($table, $data, $primaryKey){
    // Handle Insert or Update Data. Highly Depending on Primary Key Column
    // Empty Table or Data ? Fail !
    if (empty($table) || empty($data)) return false;

    // Control Insert or Update
    if (empty($data[$primaryKey])) {
      // Insert
      return $this->db->insert($table, $data);
    } else {
      // Update
      return $this->db->update($table, $data, [$primaryKey => $data[$primaryKey]]);
    }
  }

  public function DeleteData($table, $column, $value, $data){
    // Controller to Perform Both Soft & Hard Delete on Table
    if (empty($data)) {
      // Data Empty ? Hard Delete
      return $this->db->where($column, $value)->delete($table);
    } else {
      // Otherwise, Soft Delete
      return $this->db->update($table, $data, [$column => $value]);
    }
  }
}
?>