// 5. Verificar se uma palavra começa com uma letra maiúscula.
verificaMaiuscula("Casa");

function verificaMaiuscula(palavra) {
    if (palavra[0] === palavra[0].toUpperCase()) {
        console.log("Começa com letra maiúscula.");
    } else {
        console.log("Não começa com letra maiúscula.");
    }
}