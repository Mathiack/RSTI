// 6. try..catch para tratar erro de divisão por zero.
function dividir(a, b) {
    try {
        if (b === 0) throw new Error("Divisão por zero!");
        console.log(a / b);
    } catch (error) {
        console.error(error.message);
    }
}
dividir(10, 0);
