<!-- Custom Styling -->
<style>
  label { color : black }
</style>
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
              <input type="text" class="form-control" value="<?php echo $primer['user'];?>" readonly>
            </div>
            <!-- Tanggal -->
            <div class="col-md-6">
              <label for="tanggal" class="form-label">Tanggal Revisi</label>
              <input type="text" class="form-control" value="<?php echo $primer['tanggal'];?>" readonly>
            </div>
          </div>
        </div>
        <!-- Kenapa Revisi ? -->
        <div class="form-group">
          <label for="serial" class="form-label">Sebut Alasan Revisi Perjanjian Kerja Sama</label>
          <input type="text" class="form-control" value="<?php echo $primer['alasan'];?>" readonly>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hallo -->
<section class="panel">
  <!-- Title 2 -->
  <header class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
    <h4 class="panel-title"><i class="fas fa-pen"></i>&nbsp;&nbsp;Perjanjian Kerja Sama Sebelum Revisi</h4>
  </header>
  <!-- 2 -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <!-- Pilih Perjanjian -->
        <div class="form-group">
          <label for="serial" class="form-label">Pilih Perjanjian Kerja Sama</label>
          <input type="text" class="form-control" value="<?php echo $olders['nomor_kontrak'];?>" readonly>
        </div>
        <!-- Judul -->
        <div class="form-group">
          <label for="judul" class="form-label">Judul Perjanjian Kerja Sama</label>
          <input type="text" class="form-control" value="<?php echo $olders['nama_pekerjaan'];?>" readonly>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input type="text" class="form-control" value="<?php echo $olders['tanggal_mulai'];?>" readonly>
            </div>
            <div class="col-sm-6">
              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
              <input type="text" class="form-control" value="<?php echo $olders['tanggal_selesai'];?>" readonly>
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
              <input type="text" class="form-control" value="<?php echo $olders['harga_satuan'];?>" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ? -->
<section class="panel">
  <!-- Title 2 -->
  <header class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
    <h4 class="panel-title"><i class="fas fa-pen"></i>&nbsp;&nbsp;Perjanjian Kerja Sama After Revisi</h4>
  </header>
  <!-- 2 -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <!-- Pilih Perjanjian -->
        <div class="form-group">
          <label for="serial" class="form-label">Pilih Perjanjian Kerja Sama</label>
          <input type="text" class="form-control" value="<?php echo $result['uuid'];?>" readonly>
        </div>
        <!-- Judul -->
        <div class="form-group">
          <label for="judul" class="form-label">Judul Perjanjian Kerja Sama</label>
          <input type="text" class="form-control" value="<?php echo $result['judul'];?>" readonly>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input type="text" class="form-control" value="<?php echo $result['tanggal_mulai'];?>" readonly>
            </div>
            <div class="col-sm-6">
              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
              <input type="text" class="form-control" value="<?php echo $result['tanggal_selesai'];?>" readonly>
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
              <input type="text" class="form-control" value="<?php echo $result['harga_satuan'];?>" readonly>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</section>