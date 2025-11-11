<!-- Final Version of Perjanjian Kerja Sama Table -->
<!-- Custom Styling -->
<style>
	.dt-buttons, #table-export_filter, div.dataTables_wrapper div.dataTables_paginate {
    display: none !important;
  }
  table td {
   vertical-align: middle !important;
  }
</style>
<!-- Wrapper Panel Table Perjanjian Kerja Sama -->
<section class="panel">
  <!-- Panel Title -->
  <header class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
    <h4 class="panel-title"><i class="fas fa-table"></i>&nbsp;&nbsp;Tabel Perjanjian Kerja Sama Gas Medis</h4>
    <h4 class="panel-title">
      <a href="<?= base_url('kerja/kerja/insert')?>" class="btn btn-default btn-tambah-pesanan">
        <i class="fas fa-pen-nib"></i>&nbsp;&nbsp;Perjanjian Kerja Sama Baru
      </a>
    </h4>
  </header>
  <!-- Panel Table -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-condensed" cellspacing="0" width="100%" id="table-export">
            <thead>
              <tr>
                <th class="text-center">Supplier</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Tanggal Mulai</th>
                <th class="text-center">Tanggal Selesai</th>
                <th class="text-center">Harga Satuan</th>
                <th class="text-center">Detail</th>
              </tr>
            </thead>
            <!-- Table Content -->
            <tbody>
              <?php foreach ($result as $row): ?>
              <tr>
                <td class="text-center"><?php echo html_escape($row['company_name']); ?></td>
                <td class="text-center"><?php echo html_escape($row['judul']); ?></td>
                <td class="text-center"><?php echo html_escape($row['tanggal_mulai']); ?></td>
                <td class="text-center"><?php echo html_escape($row['tanggal_selesai']); ?></td>
                <td class="text-center"><?php echo "Rp. " . number_format($row['harga_satuan']); ?></td>
                <!-- Multi Variable -->
                <td class="text-center">
                  <!-- Detail Perjanjian Kerja Sama -->
                  <a href="<?= base_url('kerja/kerja/detail/' . $row['uuid']); ?>" class="btn btn-circle icon btn-info">
                    <i class="fas fa-eye"></i>
                  </a>
                  <!-- Detail Adendum -->
                  <a href="<?= base_url('kerja/adendum/insert/' . $row['uuid']); ?>" class="btn btn-circle icon btn-warning">
                    <i class="fas fa-pen"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>