// Capturar tecla "Enter" no terminal com Node.js
const readline = require('readline');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

console.log("Pressione Enter para continuar...");
rl.on('line', (input) => {
    if (input === '') {
        console.log("Tecla Enter pressionada!");
        rl.close(); // Fecha a interface após a captura
    } else {
        console.log("Você digitou:", input);
    }
});
