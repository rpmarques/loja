$(document).ready(function () {
  // PRICEFORMAT
  $('.valor').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.',
    allowNegative: false
  });
  $('.qtde').priceFormat({
    prefix: '',
    centsSeparator: ',',
    thousandsSeparator: '.',
    allowNegative: false
  });
  //Date range picker
  $('.data_intervalo').daterangepicker({
    "locale": {
      "format": "DD/MM/YYYY", //DATA NO FORMATO DD/MM/AAAA
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar"
    }
  })
  // DATAPICKER
  $('.data').datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR",
    autoclose: "true",
    immediateUpdates: "true",
    todayHighlight: "true"
  });

  //Select2 
  $('.select2').select2({
    theme: 'bootstrap4'
  })

  // DATATABLE
  $("#example1").DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
    },
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  // MÁSCARAS
  $('.cnpj').inputmask();
  $('.cpf').inputmask();
  $('.fone').inputmask();



  $(function validaCpf() {
    $('.cpf').blur(function () {
      var cpf = $('.cpf').val();
      // Testa a validação
      if (!cpf) {
        console.log("cpf");
        if (!valida_cpf_cnpj(cpf)) {
          alert('CPF  inválido!');
        }
      }
    }); //FIM CPF
  });

  $(function validaCnpj() {
    $('.cnpj').blur(function () {
      var cnpj = $('.cnpj').val();
      if (!cnpj) {
        if (!valida_cpf_cnpj(cnpj)) {
          alert('CNPJ  inválido!');
        }
      }
    }); //FIM CNPJ
  });


});


