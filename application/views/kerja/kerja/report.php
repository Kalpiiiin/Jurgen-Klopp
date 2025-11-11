<!-- Wrapper Panel on Hasil Perjanjian Kerja Sama -->
<section class="panel">
  <!-- Tab Custom Content -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <!-- Publish to Kerja Controller on Publish -->
        <!-- Kode Sistem -->
        <div class="form-group">
          <label for="uuid" class="form-label">Kode Kontrak Sistem</label>
          <input type="text" name="uuid" id="uuid" class="form-control" value="<?php echo $result['uuid']; ?>" readonly>
        </div>
        <!-- Supplier -->
        <div class="form-group">
          <label for="company_name" class="form-label">Supplier</label>
          <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $result['company_name']; ?>" readonly>
        </div>
        <!-- Judul -->
        <div class="form-group">
          <label for="judul" class="form-label">Judul Perjanjian Kerja Sama</label>
          <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $result['judul']; ?>" readonly>
        </div>
        <!-- Tanggal Mulai -->
        <div class="form-group">
          <label for="tanggal_mulai" class="form-label">Tanggal Mulai Perjanjian</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?php echo $result['tanggal_mulai']; ?>" readonly>
        </div>
        <!-- Tanggal Selesai -->
        <div class="form-group">
          <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="<?php echo $result['tanggal_selesai']; ?>" readonly>
        </div>
        <!-- Hukum Kontrak -->
        <div class="form-group">
          <label for="nomor_hukum" class="form-label">Nomor Hukum</label>
          <input type="text" name="nomor_hukum" id="nomor_hukum" class="form-control" value="<?php echo $result['nomor_hukum']; ?>" readonly>
        </div>
        <!-- Kontrak -->
        <div class="form-group">
          <label for="nomor_kontrak" class="form-label">Nomor Kontrak</label>
          <input type="text" name="nomor_kontrak" id="nomor_kontrak" class="form-control" value="<?php echo $result['nomor_kontrak']; ?>" readonly>
        </div>
        <!-- Harga Satuan -->
        <div class="form-group">
          <label for="harga_satuan" class="form-label">Harga Satuan</label>
          <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" value="<?php echo number_format($result['harga_satuan']); ?>" readonly>
        </div>
        <!-- Total Revisi Kontrak -->
        <div class="form-group">
          <label for="total_adendum" class="form-label">Total Adendum</label>
          <input type="text" name="total_adendum" id="total_adendum" class="form-control" value="<?php echo $result['total_adendum']; ?>" readonly>
        </div>
        <!-- Total Surat Pemesanan -->
        <div class="form-group">
          <label for="total_surat" class="form-label">Total Surat Pemesanan</label>
          <input type="text" name="total_surat" id="total_surat" class="form-control" value="<?php echo $result['total_surat']; ?>" readonly>
        </div>
        <!-- Estimasi Kuantitas -->
        <div class="form-group">
          <label for="estimasi_kuantitas" class="form-label">Estimasi Kuantitas Pesanan Seluruh Perjanjian Kerja Sama</label>
          <input type="text" name="estimasi_kuantitas" id="estimasi_kuantitas" class="form-control" value="<?php echo $result['estimasi_kuantitas']; ?>" readonly>
        </div>
        <!-- ? -->
        <div class="form-group">
          <label for="total_order" class="form-label">Total Order Liquid Oxygen</label>
          <input type="text" name="total_order" id="total_order" class="form-control" value="<?php echo $result['total_order']; ?>" readonly>
        </div>
        <!-- ? -->
        <div class="form-group">
          <label for="kuantitas_ordered" class="form-label">Kuantitas Ordered</label>
          <input type="text" name="kuantitas_ordered" id="kuantitas_ordered" class="form-control" value="<?php echo $result['kuantitas_ordered']; ?>" readonly>
        </div>
        <!-- Total -->
        <div class="form-group">
          <label for="total_penerimaan" class="form-label">Total Penerimaan</label>
          <input type="text" name="total_penerimaan" id="total_penerimaan" class="form-control" value="<?php echo $result['total_penerimaan']; ?>" readonly>
        </div>
        <!-- Total Di Terima -->
        <div class="form-group">
          <label for="kuantitas_penerimaan" class="form-label">Kuantitas Penerimaan</label>
          <input type="text" name="kuantitas_penerimaan" id="kuantitas_penerimaan" class="form-control" value="<?php echo $result['kuantitas_penerimaan']; ?>" readonly>
        </div>
        <!-- Total Saldo Realisasi -->
        <div class="form-group">
          <label for="total_saldo_terima" class="form-label">Total Saldo Terima</label>
          <input type="text" name="total_saldo_terima" id="total_saldo_terima" class="form-control" value="<?php echo $result['total_saldo_terima']; ?>" readonly>
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