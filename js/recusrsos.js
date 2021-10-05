$(document).ready(function() {
    //TROCAR MÁSCARA DINAMICAMENTE CPF OU CNPJ
    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cgc').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }    
    $('.cgc').length > 11 ? $('.cgc').mask('00.000.000/0000-00', options) : $('.cgc').mask('000.000.000-00#', options);

    
    $('.fone').mask('(00)-00000-0000');
    $('.cep').mask('00000-000');

});