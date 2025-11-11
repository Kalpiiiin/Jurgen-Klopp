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
<?php echo form_open('/kerja/adendum/publish', ['id' => 'form_kerja_sama']); ?>
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
              <label for="user" class="form-label">Pelaku</label>
              <input type="text" name="user" id="user" class="form-control" value="<?php echo get_user_name();?>" readonly>
            </div>
            <!-- Tanggal -->
            <div class="col-md-6">
              <label for="tanggal" class="form-label">Tanggal Revisi</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control" readonly>
            </div>
          </div>
        </div>
        <!-- Kenapa Revisi ? -->
        <div class="form-group">
          <label for="serial" class="form-label">Sebut Alasan Revisi Perjanjian Kerja Sama</label>
          <input type="text" name="alasan" id="alasan" class="form-control">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hallo -->
<section class="panel">
  <!-- Title 2 -->
  <header class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
    <h4 class="panel-title"><i class="fas fa-pen"></i>&nbsp;&nbsp;Input Revisi Perjanjian Kerja Sama</h4>
  </header>
  <!-- 2 -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <!-- Pilih Perjanjian -->
        <div class="form-group">
          <label for="serial" class="form-label">Pilih Perjanjian Kerja Sama</label>
          <input type="text" name="serial" id="serial" class="form-control" value="<?php echo $content['uuid'];?>" readonly>
        </div>
        <!-- Judul -->
        <div class="form-group">
          <label for="judul" class="form-label">Judul Perjanjian Kerja Sama</label>
          <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $content['judul'];?>" require>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?php echo $content["tanggal_mulai"];?>">
            </div>
            <div class="col-sm-6">
              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
              <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="<?php echo $content["tanggal_selesai"];?>">
            </div>
          </div>
        </div>
        <!-- Serial Kontrak -->
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="tanggal_mulai" class="form-label">Nomor Hukum Kontrak</label>
              <input type="text" class="form-control" value="<?php echo $content["nomor_hukum"];?>" readonly>
            </div>
            <div class="col-sm-6">
              <label for="tanggal_selesai" class="form-label">Nomor Kontrak Supplier</label>
              <input type="text" class="form-control" value="<?php echo $content["nomor_kontrak"];?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="tanggal_mulai" class="form-label">Gas Medis</label>
              <input type="text" value="Liquid Oxygen" class="form-control" readonly>
            </div>
            <div class="col-sm-6">
              <label for="tanggal_selesai" class="form-label">Harga Satuan Disepakati</label>
              <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="<?php echo $content["harga_satuan"];?>">
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
    $('#tanggal').val(formatDate(today));
  })
</script>