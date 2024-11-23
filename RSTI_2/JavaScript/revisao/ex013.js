// 13. Verificar se uma string é um palíndromo.
function ehPalindromo(palavra) {
    let reverso = palavra.split("").reverse().join("");
    return palavra === reverso;
}
console.log(ehPalindromo("arara")); // true
