let gasOptions = [];

function fetchGasesOptions(url, filter = 'all') {
  return $.ajax({
    url: url,
    type: 'GET',
    dataType: 'JSON'
  }).then(response => {
    let filteredResponse = response;
    
    if (filter === 'konsolidasi') {
      filteredResponse = response.filter(item => {
        return item.text !== 'Liquid Oxygen';
      });
    }
    
    gasOptions = filteredResponse.map(item => ({
      id: item.id,
      text: item.text,
      jumlah: item.jumlah
    }));
    
    return gasOptions; 
    
  }).catch(xhr => {
    console.error("Error Fetching Gases Options:", xhr.responseText);
    throw xhr; 
  });
}

function initGasesDropdowns(targetName = "gases[]") {
  $(`select[name='${targetName}']`).each(function() {
    $(this).select2({
      placeholder: "Pilih Gas",
      width: '100%',
      data: [{ id: '', text: 'Pilih Gas' }, ...gasOptions] 
    });
  });
}

function updateGasesDropdowns(targetName = "gases[]") {
  let selectedValues = $(`select[name='${targetName}']`).map(function() {
    return $(this).val();
  }).get().filter(Boolean);

  $(`select[name='${targetName}']`).each(function() {
    const $select = $(this);
    const currentValue = $select.val();

    const filteredOptions = gasOptions.filter(
      opt => !selectedValues.includes(opt.id) || opt.id === currentValue
    );

    $select.empty();
    $select.append(new Option("Pilih Gas", "", false, false));
    filteredOptions.forEach(opt => {
      $select.append(new Option(opt.text, opt.id, false, opt.id === currentValue));
    });

    $select.trigger('change.select2');
  });
}

function globalgases(url, targetName = "gases[]", filter = "all", totalinput = null) {
  fetchGasesOptions(url, filter).then(() => {
    initGasesDropdowns(targetName);

    $(document).off('change.globalgases').on('change.globalgases', `select[name='${targetName}']`, function() {
      updateGasesDropdowns(targetName);
      if (totalinput) {
        const $select = $(this);
        const selectedGasId = $select.val();
        const $targetInput = $select.closest('tr, .row, .form-group').find('.' + totalinput);
        if ($targetInput.length > 0) { // Check if we found the input
          if (selectedGasId) {
            // Find the full gas object from the globally stored options
            const selectedGas = gasOptions.find(opt => opt.id === selectedGasId);

            if (selectedGas && typeof selectedGas.jumlah !== 'undefined') {
              // Found the gas and it has a 'jumlah' property
              $targetInput.val(selectedGas.jumlah);
            } else {
              // Gas selected but not found, or has no 'jumlah'
              $targetInput.val(''); 
            }
          } else {
            // No gas selected (e.g., "Pilih Gas"), so clear the input
            $targetInput.val('');
          }
        }
      }
    });
  });
}