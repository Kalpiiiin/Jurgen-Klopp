<!-- Final Version of Detail Input Penerimaan Gas Medis -->
<!-- Custom Styling -->
<style>
	.dt-buttons, #table-export_filter, div.dataTables_wrapper div.dataTables_paginate {
    display: none !important;
  }
  label { color : black }
</style>
<!-- Wrapper Panel on Input Gas Medis -->
<section class="panel">
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <!-- Detail Formulir Input -->
        <!-- Kontrak Relate -->
        <div class="form-group">
          <!-- Order -->
          <label for="order" class="form-label">Order Sistem</label>
          <input type="text" name="order" id="order" value="123456" class="form-control" readonly>
        </div>
        <!-- Penerimaan Metadata -->
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control" readonly>
            </div>
            <!-- Total Berat Akhir -->
            <div class="col-sm-6">
              <label for="user" class="form-label">User</label>
              <input type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        <!-- Total Berat Awal -->
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="berat_awal" class="form-label">Total Berat Awal (Kilo)</label>
              <input type="text" class="form-control" readonly>
            </div>
            <!-- Total Berat Akhir -->
            <div class="col-sm-6">
              <label for="berat_akhir" class="form-label">Total Berat Akhir (Kilo)</label>
              <input type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        <!-- Selisih & Konversi -->
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="selisih_berat" class="form-label">Selisih (Kilo)</label>
              <!-- Hallo, Penjelasan 1 ! -->
              <span id="info_selisih_alert" style="color: #007bff; cursor: pointer; margin-left: 5px;">
                <i class="fas fa-info-circle"></i>
              </span>
              <input type="text" id="selisih_berat" class="form-control" readonly>
            </div>
            <!-- Kontrak Supplier -->
            <div class="col-sm-6">
              <label for="konversi" class="form-label">Selisih (Meter Kubik)</label>
              <!-- Hallo, Penjelasan 2 ! -->
              <span id="nilai_ubah_alert" style="color: #007bff; cursor: pointer; margin-left: 5px;">
                <i class="fas fa-info-circle"></i>
              </span>
              <input type="text" id="konversi" class="form-control" readonly>
            </div>
          </div>
        </div>
        <!-- Gas & Harga -->
        <div class="form-group">
          <!-- Harga Satuan -->
          <label for="terima" class="form-label">Total Terima Gas Medis (Meter Kubik)</label>
          <input type="text" class="form-control" readonly>
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

<!-- Support Script -->
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
    // Nilai Order
    initSelect2("#supplier", "<?= base_url('supplier/SupplierOnly') ?>", "Pilih Supplier");
    // Calculate Weight
    function calculateWeight() {
      // Multi Math
      let beratAwal = parseFloat($('#berat_awal').val()) || 0;
      let beratAkhir = parseFloat($('#berat_akhir').val()) || 0;
      let selisih = beratAwal - beratAkhir;
      $('#selisih_berat').val(selisih);
      let konverta = selisih * 0.7768;
      $('#konversi').val(konverta)
      let final = konverta - 131;
      $('#terima').val(final);
    }
    // Input Berat Awal & Berat Akhir Auto Calculate Weight
    $('#berat_awal, #berat_akhir').on('input', function() {
      calculateWeight();
    });
    // Selisih Nilai Berat
    $('#info_selisih_alert').on('click', function() {
      alert("Selisih dari Berat Awal - Berat Akhir");
    });
    // Selisih Nilai Konversi
    $('#nilai_ubah_alert').on('click', function() {
      alert("Nilai Selisih di Kali 0.7768 !");
    });
  })
</script>