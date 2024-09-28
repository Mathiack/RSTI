let primeira = 5;
let segunda = 10;

let soma = primeira + segunda;
let sub = primeira - segunda;
let multi = primeira * segunda;
let div = primeira / segunda;
let mod = primeira % 2;

console.log("------------");
console.log("Primeiro valor: " + primeira);
console.log("Segundo valor: " + segunda);
console.log("------------");
console.log("Soma: " + soma);
console.log("Subtração: " + sub);
console.log("Multiplicação: " + multi);
console.log("Divisão: " + div);
console.log("------------");
console.log("Módulo (resto da divisão): " + mod);

if(mod == 0){
    console.log("O número é par");
} else {
    console.log("O número é impar");
}
console.log("------------");