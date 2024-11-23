// 12. Função que lança exceção para números negativos.
function verificaNumero(numero) {
    if (numero < 0) throw new Error("Número negativo não permitido!");
    console.log("Número válido.");
}
try {
    verificaNumero(-5);
} catch (error) {
    console.error(error.message);
}
