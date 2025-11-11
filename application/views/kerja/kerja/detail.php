<!-- Final Version of Detail on Perjanjian Kerja Sama ! -->
<!-- Custom Styling -->
<style>
	.dt-buttons, #table-export_filter, div.dataTables_wrapper div.dataTables_paginate {
    display: none !important;
  }
  label { color : black }
</style>
<!-- Wrapper Panel on Perjanjian Kerja Sama Detail -->
<section class="panel">
  <!-- Custom Panel -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <div class="form-group">
          <div class="row">
            <!-- Supplier -->
            <div class="col-sm-6">
              <label for="company_name" class="form-label">Supplier</label>
              <input type="text" value="<?php echo html_escape($result['company_name']); ?>" class="form-control" readonly>
            </div>
            <!-- Kode Kerja Sama -->
            <div class="col-sm-6">
              <label for="uuid" class="form-label">Kode Kerja Sama</label>
              <input type="text" class="form-control" value="<?php echo $result['uuid'];?>" readonly>
            </div>
          </div>
        </div>
        <!-- Judul -->
        <div class="form-group">
          <label for="judul" class="form-label">Judul Perjanjian Kerja Sama</label>
          <input type="text" value="<?php echo $result["judul"];?>" class="form-control" readonly>
        </div>
        <!-- Tanggal -->
        <div class="form-group">
          <div class="row">
            <!-- Mulai -->
            <div class="col-sm-6">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input type="date" class="form-control" value="<?php echo $result["tanggal_mulai"];?>" readonly>
            </div>
            <!-- Selesai -->
            <div class="col-sm-6">
              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
              <input type="date" class="form-control" value="<?php echo $result["tanggal_selesai"];?>" readonly>
            </div>
          </div>
        </div>
        <!-- Kontrak -->
        <div class="form-group">
          <div class="row">
            <!-- Hukum Kontrak -->
            <div class="col-sm-6">
              <label for="nomor_hukum" class="form-label">Nomor Hukum Kontrak</label>
              <input type="text" class="form-control" value="<?php echo $result["nomor_hukum"];?>" readonly>
            </div>
            <!-- Kontrak Supplier -->
            <div class="col-sm-6">
              <label for="nomor_kontrak" class="form-label">Nomor Kontrak Supplier</label>
              <input type="text" class="form-control" value="<?php echo $result["nomor_kontrak"];?>" readonly>
            </div>
          </div>
        </div>
        <!-- Gases & Harga -->
        <div class="form-group">
          <div class="row">
            <!-- Gases : Liquid Oxygen -->
            <div class="col-sm-6">
              <label class="form-label">Gas Medis</label>
              <input type="text" value="Liquid Oxygen" class="form-control" readonly>
            </div>
            <!-- Harga Satuan -->
            <div class="col-sm-6">
              <label for="harga_satuan" class="form-label">Harga Satuan Disepakati</label>
              <input type="number" class="form-control" value="<?php echo $result["harga_satuan"];?>" readonly>
            </div>
          </div>
        </div>
        <!-- Footer Panel -->
        <div class="panel-footer">
          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-default pull-left" onclick="history.back(); return false;">
                <i class="fas fa-arrow-left"></i> <?php echo translate('kembali'); ?>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>