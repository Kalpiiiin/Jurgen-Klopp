<!-- Final Version of Table Revisi Perjanjian Kerja Sama -->
<!-- Custom Styling -->
<style>
  .dt-buttons, #table-export_filter, div.dataTables_wrapper div.dataTables_paginate {
    display: none !important;
  }
  table td {
   vertical-align: middle !important;
  }
</style>
<!-- Wrapper Panel on Tabel Revisi Perjanjian Kerja Sama -->
<section class="panel">
  <!-- Panel Title -->
  <header class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
    <h4 class="panel-title"><i class="fas fa-table"></i>&nbsp;&nbsp;Tabel Adendum Perjanjian Kerja Sama</h4>
  </header>
  <!-- Panel Table -->
  <div class="tabs-custom">
    <div class="tab-content">
      <div class="tab-pane box active">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-condensed" cellspacing="0" width="100%" id="table-export">
            <thead>
              <tr>
                <th class="text-center">Kode Sistem</th>
                <th class="text-center">Perjanjian Kerja Sama</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">User</th>
                <th class="text-center">Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($result as $row): ?>
              <tr>
                <td class="text-center"><?php echo html_escape($row['uuid']); ?></td>
                <td class="text-center"><?php echo html_escape($row['nomor_kontrak']); ?></td>
                <td class="text-center"><?php echo html_escape($row['tanggal']); ?></td>
                <td class="text-center"><?php echo html_escape($row['user']); ?></td>
                <!-- Detail -->
                <td class="text-center">Detail</td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>