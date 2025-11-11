<!-- Final Version of Supplier ! Supplier OK ! -->
<!-- Custom Styling -->
<style>
  .select2-container .select2-selection { height: 34px; }
  .select2-container--default .select2-selection--single .select2-selection__rendered { margin-top: 3px; }
  .select2-container--default .select2-selection--single .select2-selection__arrow { display: none; }
</style>
<!-- Wrapper Panel Table & Input Supplier -->
<section class="panel">
  <div class="tabs-custom">
    <ul class="nav nav-tabs">
			<!-- Tabel Menu -->
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#menu_list" data-toggle="tab" id="tab_list" name="tab_list"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;Tabel Supplier</a>
			</li>
      <?php if (get_permission('supplier', 'is_add')) { ?>
			<!-- Input Menu -->
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#menu_create" data-toggle="tab" id="tab_create" name="tab_create"><i class="far fa-edit"></i>&nbsp;&nbsp;Input Supplier</a>
			</li>
      <?php } ?>
		</ul>
    <!-- Tab Content -->
    <div class="tab-content">
			<div id="menu_list" name="menu_list" class="tab-pane <?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<div class="table-responsive mb-md">
					<div class="export_title">Tabel Supplier</div>
					<!-- Tabel Content -->
					<table class="table table-bordered table-hover table-condensed" cellspacing="0" width="100%" id="list_data" name="list_data">
						<thead>
							<tr>
								<th>Sl.</th>
								<th>Nama Pimpinan</th>
								<th>Jabatan</th>
								<th>Perusahaan</th>
								<th>Telepon</th>
								<th>Email</th>
								<th><?php echo translate('action'); ?></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<!-- Insert | Update | Detail on Supplier -->
			<?php if (get_permission('supplier', 'is_add') || get_permission('supplier', 'is_edit')) { ?>
			<div class="tab-pane <?php echo (isset($validation_error) ? 'active' : ''); ?>" id="menu_create" name="menu_create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered validate', 'id' => 'form_supplier', 'name' => 'form_supplier')); ?>
          <!-- Kode Supplier -->
          <div class="form-group <?php if (form_error('uuid')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Kode Supplier</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="uuid" name="uuid" readonly>
							<span class="error"><?php echo form_error('uuid'); ?></span>
						</div>
					</div>
          <!-- Informasi Pimpinan -->
					<div class="form-group <?php if (form_error('name')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Informasi Pimpinan</label>
					</div>
					<!-- Nama Perorangan -->
					<div class="form-group <?php if (form_error('name')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Nama <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nama Pimpinan/Pemilik" maxlength="250" required />
							<span class="error"><?php echo form_error('name'); ?></span>
						</div>
					</div>
					<!-- Posisi Perorangan -->
					<div class="form-group <?php if (form_error('position')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Posisi <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="position" name="position" placeholder="Posisi" maxlength="250" required />
							<span class="error"><?php echo form_error('position'); ?></span>
						</div>
					</div>
					<!-- Perusahaan -->
					<div class="form-group <?php if (form_error('name')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Informasi Perusahaan</label>
					</div>
					<!-- Nama Perusahaan -->
					<div class="form-group <?php if (form_error('company_name')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Nama <span class="required">*</span></label>
						<!-- Jenis Usaha -->
						<div class="col-md-2">
							<select class="form-control" id="jenis_usaha_id" name="jenis_usaha_id"></select>
							<span class="error"><?php echo form_error('jenis_usaha_id'); ?></span>
						</div>
						<!-- Nama Perusahaan -->
						<div class="col-md-4">
							<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Nama Perusahaan" maxlength="250" required />
							<span class="error"><?php echo form_error('company_name'); ?></span>
						</div>
					</div>
					<!-- Alamat Perusahaan -->
					<div class="form-group <?php if (form_error('address')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Alamat <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="address" name="address" placeholder="Alamat required" maxlength="250" required />
							<span class="error"><?php echo form_error('address'); ?></span>
						</div>
					</div>
					<!-- Telepon / Email -->
					<div class="form-group <?php if (form_error('mobileno')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">No Telepon & Email <span class="required">*</span></label>
						<!-- Telephone Perusahaan -->
						<div class="col-md-2">
							<input type="number" class="form-control" id="mobileno" name="mobileno" placeholder="No Telepon" maxlength="25" required />
							<span class="error"><?php echo form_error('mobileno'); ?></span>
						</div>
						<!-- Email Perusahaan -->
						<div class="col-md-4">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="100" required />
							<span class="error"><?php echo form_error('email'); ?></span>
						</div>
					</div>
					<!-- Bank -->
					<div class="form-group <?php if (form_error('bank_id')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label">Bank <span class="required">*</span></label>
						<div class="col-12 col-md-2 mb-2 mb-md-0">
							<select class="form-control" id="bank_id" name="bank_id"></select>
							<span class="error"><?php echo form_error('bank_id'); ?></span>
						</div>
						<!-- Rekening -->
						<div class="col-12 col-md-4 mb-2 mb-md-0">
							<input type="text" class="form-control" id="bank_acc" name="bank_acc" placeholder="No Rekening" maxlength="25" required />
							<span class="error"><?php echo form_error('bank_acc'); ?></span>
						</div>
					</div>
					<!-- Footer -->
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" id="supplier_save" name="supplier_save" value="1">
									<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
			<?php } ?>
		</div>
  </div>
</section>

<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		// Auto Call Function
		supplier_list();
		// Click Tabel Menu Call Function
		$(document).on('click', '#tab_list', function() {
			supplier_list();
		});
		// Define Supplier Function
		function supplier_list() {
			$('#list_data').DataTable().destroy();
			var list_data = $('#list_data').DataTable({
				processing: true,
				serverSide: false,
				deferRender: true,
				ajax: {
					url: '<?= base_url('supplier/supplier') ?>',
					type: 'POST',
					dataType: 'JSON',
					encode: true,
					beforeSend: function(e) {
						if (e && e.overrideMimeType) {
							e.overrideMimeType('application/json;charset=UTF-8');
						}
					},
					cache: false,
					dataSrc: function(json) {
						return json.data;
					}
				},
				columnDefs: [{
					className: 'text-center',
					targets: [0, 6]
				}],
				order: [
					[0, 'asc']
				],
				pagingType: 'full_numbers',
				dom: 'Bfrtip',
				buttons: ['pageLength', 'copy', 'excel', 'pdf', 'print'],
				'bDestroy': true
			});
		}
		<?php if (get_permission('supplier', 'is_add') || get_permission('supplier', 'is_edit')) { ?>
			// Prepare Input or Change Formulir 
			$(document).on('click', '#tab_create', function(e) {
				e.preventDefault();
				$('#form_supplier :input').removeAttr('disabled');
				document.getElementById('supplier_save').style.display = 'block';
				$('#form_supplier')[0].reset();
			});
			// Select Option Jenis Usaha
			initSelect2("#jenis_usaha_id", "<?= base_url('refferal/get_jenis_usaha') ?>", "Pilih Jenis Usaha");
			// Select Option Bank
			initSelect2("#bank_id", "<?= base_url('refferal/get_bank') ?>", "Pilih Bank");
			// Publish Insert or Changes
			$(document).on('submit', '#form_supplier', function(e) {
				e.preventDefault();
				// Controller
				$.ajax({
					url: '<?= base_url('supplier/publish') ?>',
					type: 'POST',
					dataType: 'JSON',
					async: false,
					encode: true,
					beforeSend: function(e) {
						if (e && e.overrideMimeType) {
							e.overrideMimeType('application/json;charset=UTF-8');
						}
					},
					cache: false,
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {
						if (data.status == 'success') {
							Swal.fire({
								title: 'Success!',
								text: data.message,
								type: 'success',
								confirmButtonText: 'OK'
							}).then(() => {
								location.reload();
							});
						} else {
							Swal.fire({
								title: 'Error!',
								html: data.message,
								type: 'error',
								confirmButtonText: 'OK'
							});
						}
					}
				});
			});
			// Fill Detail on Edit
			$(document).on('click', '#edit_supplier', function(e) {
				e.preventDefault();
				var data_edit_supplier = $(this).attr('data_edit_supplier');
				document.getElementById('supplier_save').style.display = 'block';
				$('#form_supplier :input').removeAttr('disabled');
				$('#form_supplier')[0].reset();
				// Controller
				$.ajax({
					url: '<?= base_url('supplier/detail') ?>',
					type: 'POST',
					data: {
						data_edit_supplier: data_edit_supplier
					},
					dataType: 'JSON',
					async: false,
					encode: true,
					beforeSend: function(e) {
						if (e && e.overrideMimeType) {
							e.overrideMimeType('application/json;charset=UTF-8');
						}
					},
					cache: false,
					success: function(data) {
						// Fill Value with Model Detail Content
						$('#uuid').val(data_edit_supplier);
						$('#name').val(data.name);
						$('#position').val(data.position);
						let $jenis_usaha = $("<option selected='selected'></option>").val(data.jenis_usaha_id).text(data.jenis_usaha);
						$("#jenis_usaha_id").append($jenis_usaha).trigger('change');
						$('#company_name').val(data.company_name);
						$('#address').val(data.address);
						$('#mobileno').val(data.mobileno);
						$('#email').val(data.email);
						let $bank = $("<option selected='selected'></option>").val(data.bank_id).text(data.bank);
						$("#bank_id").append($bank).trigger('change');
						$('#bank_acc').val(data.bank_acc);
						$('a[href="#menu_create"]').tab('show');
					}
				});
			});
			// Fill Input on View Detail
			$(document).on('click', '#view_supplier', function(e) {
				e.preventDefault();
				var data_view_supplier = $(this).attr('data_view_supplier');
				$('#form_supplier')[0].reset();
				document.getElementById('supplier_save').style.display = 'none';
				$('#form_supplier :input').attr('disabled', 'disabled');
				// Controller
				$.ajax({
					url: '<?= base_url('supplier/detail') ?>',
					type: 'POST',
					data: {
						data_edit_supplier: data_view_supplier
					},
					dataType: 'JSON',
					async: false,
					encode: true,
					beforeSend: function(e) {
						if (e && e.overrideMimeType) {
							e.overrideMimeType('application/json;charset=UTF-8');
						}
					},
					cache: false,
					success: function(data) {
						$('#uuid').val(data_view_supplier);
						$('#name').val(data.name);
						$('#position').val(data.position);
						let $jenis_usaha = $("<option selected='selected'></option>").val(data.jenis_usaha_id).text(data.jenis_usaha);
						$("#jenis_usaha_id").append($jenis_usaha).trigger('change');
						$('#company_name').val(data.company_name);
						$('#address').val(data.address);
						$('#mobileno').val(data.mobileno);
						$('#email').val(data.email);
						let $bank = $("<option selected='selected'></option>").val(data.bank_id).text(data.bank);
						$("#bank_id").append($bank).trigger('change');
						$('#bank_acc').val(data.bank_acc);
						$('a[href="#menu_create"]').tab('show');
					}
				});
			});
		<?php } ?>
	})
</script>