// 3. Programa com switch para exibir mensagem por faixa de valores.
function faixaDeValores(numero) {
    switch (true) {
        case numero < 10:
            console.log("Número menor que 10.");
            break;
        case numero < 20:
            console.log("Número entre 10 e 19.");
            break;
        default:
            console.log("Número 20 ou maior.");
    }
}
faixaDeValores(15);
faixaDeValores(1);
faixaDeValores(236945);
