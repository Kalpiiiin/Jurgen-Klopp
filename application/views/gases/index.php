<!-- Custom Styling -->
<!-- Mostly to Style Out Select Formulir -->
<style>
  .select2-container .select2-selection { height: 38px; }
  .select2-container--default .select2-selection--single .select2-selection__rendered { margin-top: 3px; }
  .select2-container--default .select2-selection--single .select2-selection__arrow { display: none; }
</style>
<!-- Wrapper Section on Both Table Panel & Formulir -->
<section class="panel">
  <!-- Panel Custom -->
  <div class="tabs-custom">
    <!-- Tab Menu -->
		<ul class="nav nav-tabs">
      <!-- Menu Tabel -->
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#menu_list" data-toggle="tab" id="tab_list" name="tab_list"><i class="fas fa-list-ul"></i>&nbsp;Tabel Gases</a>
			</li>
			<?php if (get_permission('gases', 'is_add')) { ?>
      <!-- Menu Input Gases -->
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#menu_create" data-toggle="tab" id="tab_create" name="tab_create"><i class="far fa-edit"></i>&nbsp;Input Gases</a>
			</li>
			<?php } ?>
		</ul>
    <!-- Panel Content -->
    <div class="tab-content">
      <div id="menu_list" name="menu_list" class="tab-pane <?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<div class="table-responsive mb-md">
          <!-- Tabel Gases -->
          <table class="table table-bordered table-hover table-condensed" cellspacing="0" width="100%" id="list_data" name="list_data">
						<thead>
              <tr>
                <th class="text-center">Sl.</th>
								<th class="text-center">Gases</th>
                <th class="text-center">Kuantitas</th>
								<th class="text-center">Unit</th>
								<th class="text-center">Lain</th>
              </tr>
						</thead>
						<tbody></tbody>
					</table>
        </div>
      </div>
      <!-- Insert & Update Gases -->
      <?php if (get_permission('gases', 'is_add') || get_permission('gases', 'is_edit')) { ?>
			<div class="tab-pane <?php echo (isset($validation_error) ? 'active' : ''); ?>" id="menu_create" name="menu_create">
        <?= form_open($this->uri->uri_string(), ['class' => 'form-horizontal form-bordered validate', 'id' => 'form_gases']) ?>
          <!-- Gases ID -->
          <div class="form-group <?= form_error('id') ? 'has-error' : '' ?>">
						<label class="col-md-3 control-label">Gases ID</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="id" name="id" readonly>
							<span class="error"><?= form_error('id') ?></span>
						</div>
					</div>
          <!-- Gases -->
					<div class="form-group <?= form_error('gases') ? 'has-error' : '' ?>">
						<label class="col-md-3 control-label">Gases&nbsp;<span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="gases" name="gases" placeholder="Gases" maxlength="250" required>
							<span class="error"><?= form_error('gases') ?></span>
						</div>
					</div>
          <!-- Unit -->
          <div class="form-group">
						<label class="col-md-3 control-label">Unit</label>
						<div class="col-md-6">
              <select name="unit" id="unit" class="form-control">
                <option value="" disabled selected>Pilih Unit</option>
                <option value="Meter Kubik">Meter Kubik</option>
                <option value="Tabung">Tabung</option>
              </select>
						</div>
					</div>
          <!-- Stock -->
          <div class="form-group">
						<label class="col-md-3 control-label">Stock</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="stock" name="stock" value=0 readonly>
						</div>
					</div>
          <!-- Footer -->
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" id="gases_save" name="gases_save" value="1">
									<i class="fas fa-plus-circle"></i> <?= translate('save') ?>
								</button>
							</div>
						</div>
					</footer>
				<?php echo form_close(); ?>
			</div>
			<?php } ?>
      <!-- Insert & Update Gases -->
    </div>
  </div>
</section>

<script>
	$(document).ready(function() {
		// Auto Call Function
    gases_list();
		// Fill Table on Click Tab List
		$(document).on('click', '#tab_list', function() {
			gases_list();
		});
		// Retrieve Gases Data Table & Define Gases Function
    function gases_list() {
			// Removing All Data Tables
			$('#list_data').DataTable().destroy();
			// Define & Create Data Table
			$('#list_data').DataTable({
				processing: true,
				serverSide: false,
				deferRender: true,
        // Controller
				ajax: {
					url: '<?= base_url('gases/tabular') ?>',
					type: 'POST',
					dataType: 'JSON',
					encode: true,
					cache: false,
					beforeSend: function(xhr) {
						if (xhr && xhr.overrideMimeType) {
							xhr.overrideMimeType('application/json;charset=UTF-8');
						}
					},
					dataSrc: function(json) {
						return json.data;
					}
				},
				columnDefs: [{className: 'text-center', targets: [0, 1, 2, 3, 4]}],
				order: [[0, 'asc']],
				pagingType: 'full_numbers',
				dom: 'Bfrtip',
				buttons: ['pageLength', 'copy', 'excel', 'pdf', 'print'],
				destroy: true
			});
		}
		// Insert & Update Gases Data
		<?php if (get_permission('gases', 'is_add') || get_permission('gases', 'is_edit')): ?>
			// On Click Configuration
      $(document).on('click', '#tab_create', function(e) {
        e.preventDefault();
        $('#form_gases :input').removeAttr('disabled');
        document.getElementById('gases_save').style.display = 'block';
        $('#form_gases')[0].reset();
      });
			// Handle Controller on Publish Insert & Edit Gases Detail
      $(document).on('submit', '#form_gases', function(e) {
        e.preventDefault();
        data = new FormData(this);
        // Controller
        $.ajax({
          url: '<?= base_url('gases/publish') ?>',
          type: 'POST',
          dataType: 'JSON',
          async: false,
          encode: true,
          cache: false,
          contentType: false,
          processData: false,
          data: data,
          beforeSend: function(xhr) {
            if (xhr && xhr.overrideMimeType) {
              xhr.overrideMimeType('application/json;charset=UTF-8');
            }
          },
          success: function(data) {
						// Sukses
            if (data.status === 'success') {
              $('#form_gases')[0].reset();
              gases_list();
              $('a[href="#menu_list"]').tab('show');
              Swal.fire({
                title: 'Success !',
                text: data.message,
                type: 'success',
                confirmButtonText: 'OK'
              });
            } else {
							// Fail
              Swal.fire({
                title: 'Error !',
                html: data.message,
                type: 'error',
                confirmButtonText: 'OK'
              });
            }
          }
        });
      });
			// Fill Value on Edit Gases Feature
      $(document).on('click', '#edit_gases', function(e) {
        e.preventDefault();
        // Content Data
        const gasesId = $(this).attr('data_edit_gases');
        $('#form_gases')[0].reset();
        $('#form_gases :input').removeAttr('disabled');
        $('#gases_save').show();
        // Controller
        $.ajax({
          url: '<?= base_url('gases/detail') ?>',
          type: 'POST',
          data: { data_edit_gases: gasesId },
          dataType: 'JSON',
          async: false,
          encode: true,
          cache: false,
          beforeSend: function(xhr) {
            if (xhr && xhr.overrideMimeType) {
              xhr.overrideMimeType('application/json;charset=UTF-8');
            }
          },
          // Fill Input Value
          success: function(data) {
            $('#id').val(data.id);
            $('#gases').val(data.gases);
            $('#unit').val(data.unit).trigger('change');
            $('#stock').val(data.stock);
            $('a[href="#menu_create"]').tab('show');
          }
        });
      });
		<?php endif ?>
		// Custom Select Option on Pilih Unit
    $('#unit').select2({placeholder: "Pilih Unit", width: '100%'});
	});
</script>