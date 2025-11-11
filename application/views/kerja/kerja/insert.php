
<!-- Final Version of Perjanjian Kerja Sama Initiate -->
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
<!-- Wrapper Panel on Perjanjian Kerja Sama Formulir -->
<section class="panel">
  <!-- Tab Custom Content -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <!-- Publish to Kerja Controller on Publish -->
        <?php echo form_open('kerja/kerja/publish', ['id' => 'form_kerja_sama']); ?>
        <div class="form-group">
          <div class="row">
            <!-- Supplier -->
            <div class="col-sm-6">
              <label for="supplier" class="form-label">Pilih Supplier</label>
              <select class="form-control" id="supplier" name="supplier" required></select>
            </div>
            <!-- Kode Kerja Sama -->
            <div class="col-sm-6">
              <label for="uuid" class="form-label">Kode Kerja Sama</label>
              <input type="text" name="uuid" id="uuid" class="form-control" readonly>
            </div>
          </div>
        </div>
        <!-- Judul Kerja Sama -->
        <div class="form-group">
          <label for="judul" class="form-label">Judul Perjanjian Kerja Sama</label>
          <input type="text" name="judul" id="judul" class="form-control">
        </div>
        <!-- Tanggal -->
        <div class="form-group">
          <div class="row">
            <!-- Tanggal Mulai -->
            <div class="col-sm-6">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
            </div>
            <!-- Tanggal Selesai -->
            <div class="col-sm-6">
              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
              <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control">
            </div>
          </div>
        </div>
        <!-- Kontrak -->
        <div class="form-group">
          <div class="row">
            <!-- Hukum Kontrak -->
            <div class="col-sm-6">
              <label for="nomor_hukum" class="form-label">Nomor Hukum Kontrak</label>
              <input type="text" name="nomor_hukum" id="nomor_hukum" class="form-control">
            </div>
            <!-- Kontrak Supplier -->
            <div class="col-sm-6">
              <label for="nomor_kontrak" class="form-label">Nomor Kontrak Supplier</label>
              <input type="text" name="nomor_kontrak" id="nomor_kontrak" class="form-control">
            </div>
          </div>
        </div>
        <!-- Gases & Harga -->
        <div class="form-group">
          <div class="row">
            <!-- Gas Medis -->
            <div class="col-sm-6">
              <label class="form-label">Gas Medis</label>
              <input type="text" value="Liquid Oxygen" class="form-control" readonly>
            </div>
            <!-- Harga Satuan -->
            <div class="col-sm-6">
              <label for="harga_satuan" class="form-label">Harga Satuan Disepakati</label>
              <input type="number" name="harga_satuan" id="harga_satuan" class="form-control">
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
            <div class="col-md-6">
              <button class="btn btn-dark pull-right" type="submit"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;<span>OK</span></button>
            </div>  
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" language="javascript">
  $(document).ready(function() {
    initSelect2("#supplier", "<?= base_url('supplier/SupplierOnly') ?>", "Pilih Supplier");
  })
</script>
