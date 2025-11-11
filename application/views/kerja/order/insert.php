<!-- Custom Styling -->
<style>
	.dt-buttons, #table-export_filter, div.dataTables_wrapper div.dataTables_paginate {
    display: none !important;
  }
  label { color : black }
  .select2-container .select2-selection { height: 38px; }
  .select2-container--default .select2-selection--single .select2-selection__rendered { margin-top: 3px; }
  .select2-container--default .select2-selection--single .select2-selection__arrow { display: none; }
</style>
<!-- Input Formulir on Double Section Panel -->
<?php echo form_open('/kerja/order/publish', ['id' => 'form_kerja_sama']); ?>
<!-- Hallo -->
<section class="panel">
  <!-- Title 1 -->
  <header class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
    <h4 class="panel-title"><i class="fas fa-pen"></i>&nbsp;&nbsp;Input Meta Data Revisi Perjanjian Kerja Sama</h4>
  </header>
  <!-- 1 -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <!-- Panel Meta Title -->
        <div class="form-group">
          <div class="row">
            <!-- Pelaku -->
            <div class="col-md-6">
              <label for="uuid" class="form-label">Kode Sistem</label>
              <input type="text" name="uuid" id="uuid" class="form-control" readonly>
            </div>
            <!-- Tanggal -->
            <div class="col-md-6">
              <label for="tanggal" class="form-label">Tanggal Order</label>
              <input type="date" name="tanggal_order" id="tanggal_order" class="form-control">
            </div>
          </div>
        </div>
        <!-- Kenapa Revisi ? -->
        <div class="form-group">
          <div class="row">
            <!-- Pelaku -->
            <div class="col-md-6">
              <label for="uuid" class="form-label">Kode Surat</label>
              <select name="surat_identifier" id="surat_identifier" class="form-control"></select>
            </div>
            <!-- Tanggal -->
            <div class="col-md-6">
              <label for="user" class="form-label">User</label>
              <input type="text" name="user" id="user" class="form-control" readonly>
            </div>
          </div>
        </div>
        <!-- Kenapa Revisi ? -->
        <div class="form-group">
          <div class="row">
            <!-- Pelaku -->
            <div class="col-md-6">
              <label for="kuantitas" class="form-label">Kuantitas</label>
              <input name="kuantitas" id="kuantitas" class="form-control" require>
            </div>
            <!-- Tanggal -->
            <div class="col-md-6">
              <label for="user" class="form-label">Saldo</label>
              <input type="text" name="saldo" id="saldo" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Panel Footer -->
<section class="panel">
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <div class="panel-footer">
          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-default pull-left" onclick="history.back(); return false;">
                <i class="fas fa-arrow-left"></i> <?php echo translate('kembali'); ?>
              </button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-dark pull-right" type="submit"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;<span>OK</span></button>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php echo form_close(); ?>

<script>
  $(document).ready(function() {
    const today = new Date();
    const formatDate = (date) => date.toISOString().split("T")[0];
    $('#tanggal_order').val(formatDate(today));
  })
</script>