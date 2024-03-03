function validaCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos
    if (cpf == '') return false; // Verifica se o CPF está vazio

    // Elimina CPFs inválidos conhecidos
    if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return $('#resultado').html("<b style='color:#F00'>CPF INVÁLIDO</b>");

    // Valida 1o dígito
    let add = 0;
    for (let i = 0; i < 9; i++) add += parseInt(cpf.charAt(i)) * (10 - i);
    let rev = 11 - (add % 11);
    if (rev === 10 || rev === 11) rev = 0;
    if (rev !== parseInt(cpf.charAt(9))) return $('#resultado').html("<b style='color:F00'>CPF INVÁLIDO</b>");

    // Valida 2o dígito
    add = 0;
    for (let i = 0; i < 10; i++) add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev === 10 || rev === 11) rev = 0;
    if (rev !== parseInt(cpf.charAt(10))) return $('#resultado').html("<b style='color:F00'>CPF INVÁLIDO</b>");

    return true; // CPF válido
}