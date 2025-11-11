<!-- Final Version of Tabel Penerimaan Gas Medis -->
<!-- Custom Styling -->
<style>
	.dt-buttons, #table-export_filter, div.dataTables_wrapper div.dataTables_paginate {
    display: none !important;
  }
  table td {
   vertical-align: middle !important;
  }
</style>
<!-- Wrapper Panel on Tabel Penerimaan Gas Medis -->
<section class="panel">
  <!-- Panel Title -->
  <header class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
    <h4 class="panel-title"><i class="fas fa-table"></i> Tabel Penerimaan Liquid Oxygen</h4>
    <h4 class="panel-title">
      <a href="<?= base_url('kerja/penerimaan/insert') ?>" class="btn btn-default btn-tambah-pesanan">
        <i class="fa fa-plus"></i> Penerimaan Liquid Oxygen
      </a>
    </h4>
  </header>
  <!-- Panel Table -->
  <div class="tabs-custom">
		<div class="tab-content">
			<div class="tab-pane box active">
				<div class="table-responsive">
					<!-- Tabel Penerimaan -->
					<table class="table table-bordered table-hover table-condensed" cellspacing="0" width="100%" id="table-export">
						<thead>
							<tr>
                <th class="text-center">Kode Pesan</th>
								<th class="text-center">Tanggal Masuk</th>
								<th class="text-center">User</th>
								<th class="text-center">Jumlah</th>
                <th class="text-center">Detail</th>
							</tr>
						</thead>
            <!-- Tabel Result -->
						<tbody>
              <?php foreach ($result as $row): ?>
              <tr>
                <td class="text-center"><?php echo html_escape($row['order']); ?></td>
                <td class="text-center"><?php echo html_escape($row['tanggal']); ?></td>
                <td class="text-center"><?php echo html_escape($row['user']); ?></td>
                <td class="text-center"><?php echo number_format($row['jumlah']); ?></td>
                <td class="text-center">
                  <a href="<?= base_url('kerja/penerimaan/detail/' . $row['uuid']); ?>" class="btn btn-circle icon btn-info">
                    <i class="fas fa-eye"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
					</table>
					<br>
				</div>
			</div>
		</div>
	</div>
</section>