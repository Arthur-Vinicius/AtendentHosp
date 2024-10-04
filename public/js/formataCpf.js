
$(document).ready(function() {

    // Seleciona o campo de input do CPF pela classe.
    var cpfDigitado = $('.cpfRegex');

    // Adiciona um evento para formatar automaticamente o CPF quando o valor for digitado totalmente.
    cpfDigitado.on('input', function() {

        // Remove caracteres que não são numeros.
        var cpf = cpfDigitado.val().replace(/\D/g, '');

        // Reescreve o cpf para que fique como o formato regex determina.
        var cpfFormatado = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');

        // Define o valor formatado no campo de input.
        cpfDigitado.val(cpfFormatado);
    });
});


