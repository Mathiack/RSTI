// 14. Objeto calculadora com operações básicas.
let calculadora = {
    somar: (a, b) => a + b,
    subtrair: (a, b) => a - b,
    multiplicar: (a, b) => a * b,
    dividir: (a, b) => {
        if (b === 0) throw new Error("Divisão por zero não permitida!");
        return a / b;
    }
};
console.log(calculadora.somar(2, 3)); // 5
console.log(calculadora.subtrair(3, 2)); // 1
console.log(calculadora.multiplicar(3, 3)); // 9
// console.log(calculadora.dividir(2, 0)); // Erro
console.log(calculadora.dividir(8, 4)); // 2
