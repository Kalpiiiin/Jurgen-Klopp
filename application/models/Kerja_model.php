<?php
// Kerja Model Consist of Multi Controller Result
// Perjanjian Kerja Sama, Revisi, Yearly Order, Order, Receiver
// Final Result Available if : All Controller is Final !
defined('BASEPATH') or exit('No direct script access allowed');

class Kerja_model extends MY_Model {
  // Kerja Model Responsible on Multi Controller that Relate to Perjanjian Kerja Sama
  public function __construct(){
    parent::__construct();
  }

  // ==================================
  // Part 1 : Perjanjian Kerja Sama
  // ==================================

  public function GlobalKerja(){
    // Tabel u Seluruh Perjanjian Kerja Sama IPSRS
    $column = "uuid, company_name, judul, tanggal_mulai, tanggal_selesai, nomor_hukum, nomor_kontrak, harga_satuan";
    $sql = "SELECT $column FROM perjanjian_kerja_sama_report";
    $result = $this->db->query($sql);
    return $result->result_array();
  }

  public function PublishKerja($data){
    // Publish Data Perjanjian Kerja Sama (Handle Insert & Update)
    // Define Global Variable & Result Option
    $update = !empty($data['uuid']);
    $uuid = $update ? $data['uuid'] : $this->uuid->v4();
    // Option on Insert & Update
    if ($update) {
      // Update Option
      unset($data['uuid']);
      $this->db->update('tabel_kerja_sama', $data, ['uuid' => $uuid]);
    } else {
      // Insert Option on Our Single Array
      $insert = array(
        "uuid" => $uuid,
        "supplier" => $data['supplier'] ?? null,
        "judul" => $data['judul'] ?? null,
        "tanggal_mulai" => $data['tanggal_mulai'] ?? null,
        "tanggal_selesai" => $data['tanggal_selesai'] ?? null,
        "nomor_hukum" => $data['nomor_hukum'] ?? null,
        "nomor_kontrak" => $data['nomor_kontrak'] ?? null,
        "harga_satuan" => $data['harga_satuan'] ?? null
      );
      $this->db->insert('tabel_kerja_sama', $insert);
    }
    return $uuid;
  }

  public function DetailKerja($uuid){
    // Detail Pada Sebuah Perjanjian Kerja Sama
    $column = "uuid, company_name, judul, tanggal_mulai, tanggal_selesai, nomor_hukum, nomor_kontrak, harga_satuan";
    $filter = "WHERE uuid = ?";
    $sql = "SELECT $column FROM perjanjian_kerja_sama_report $filter";
    $result = $this->db->query($sql, [$uuid]);
    return $result->row_array();
  }

  public function DetailResult($uuid){
    // Mengambil Seluruh Kolom (Detail Lengkap) Perjanjian Kerja Sama Report
    $sql = "SELECT * FROM perjanjian_kerja_sama_report WHERE uuid = ?";
    $result = $this->db->query($sql, [$uuid]);
    return $result->row_array();

  }
  public function KerjaOnly(){
    // Mengembalikan Perjanjian Kerja Sama Aktif u Keperluan Surat Pesanan & Revisi
    $column = "uuid, judul, nomor_hukum, nomor_kontrak, tanggal_mulai, tanggal_selesai, harga_satuan";
    $filter = "WHERE is_active = 0";
    $sqlquery = "SELECT $column FROM tabel_kerja_sama $filter";
    $result = $this->db->query($sqlquery);
    return $result->row_array();
  }

  // ======================================
  // Part 2 : Revisi Perjanjian Kerja Sama
  // ======================================
  public function GlobalRevisi(){
    // Tabel u Global Revisi
    $column = "uuid, nomor_kontrak, tanggal, user";
    $sqlquery = "SELECT $column FROM tabel_adendum_kerjasama";
    $result = $this->db->query($sqlquery);
    return $result->result_array();
  }

  public function PublishRevisi($user, $tanggal, $serial, $alasan){
    // ?
    $uuid = $this->uuid->v4();
    // ?
    $inputs = array(
      "uuid" => $uuid,
      "nomor_kontrak" => $serial,
      "tanggal" => $tanggal,
      "user" => $user,
      "alasan" => $alasan
    );
    // ?
    $this->db->insert('tabel_adendum_kerjasama', $inputs);
    return $uuid;
  }

  public function PublishDetail($uuid, $serial){
    // ?
    // ?
    $column = "uuid as nomor_kontrak, judul as nama_pekerjaan, tanggal_mulai, tanggal_selesai, harga_satuan";
    $sqlquery = "SELECT $column FROM tabel_kerja_sama WHERE uuid = ?";
    $result = $this->db->query($sqlquery, [$serial])->row_array();
    // ?
    $result['adendum_uuid_trigger'] = $uuid;
    // ?
    $this->db->insert('tabel_kerja_sama_history', $result);
  }

  public function TabelDeliver(){
    // Tabel History Penerimaan Liquid Oxygen
    $sqlquery = "SELECT * FROM tabel_penerimaan_liquid";
    $result = $this->db->query($sqlquery);
    return $result->result_array();
  }

  public function PublishDeliver($inputs){
    // Model Publish Tabel Penerimaan
    // Define Penerimaan Unique Identifier
    $uuid = !empty($inputs['uuid']) ? $inputs['uuid'] : $this->uuid->v4();
    // Variable Input
    $insert = array(
      "uuid" => $uuid,
      "order" => $inputs['order'],
      "tanggal" => $inputs['tanggal'],
      "user" => $inputs['user'],
      "berat_awal" => $inputs['berat_awal'],
      "berat_akhir" => $inputs['berat_akhir'],
      "jumlah" => $inputs['terima']
    );
    // Publish Data & Result
    return $this->db->insert('tabel_penerimaan_liquid', $insert);
  }

  public function DetailDeliver($uuid){
    // Detail Penerimaan Gas Medis
    $sqlquery = "SELECT * FROM tabel_penerimaan_liquid WHERE uuid = ?";
    $result = $this->db->query($sqlquery, [$uuid]);
    return $result->row_array();
  }
}
?>