let primeira = 5;
let segunda = 10;

console.log("------------");
console.log("Primeiro valor: " + primeira);
console.log("Segundo valor: " + segunda);
console.log("------------");
console.log("Soma: " + somaNumeros(primeira, segunda));
console.log("Subtração: " + subtraiNumeros(primeira, segunda));
console.log("Multiplicação: " + multiplicaNumeros(primeira, segunda));
console.log("Divisão: " + divideNumeros(primeira, segunda));
console.log("------------");
console.log("Módulo: " + modNumeros(primeira, segunda));
//console.log(parOuImpar(mod));
console.log("------------");

function somaNumeros(primeira, segunda){
    let soma = primeira + segunda;
    return soma;
}
function subtraiNumeros(primeira, segunda){
    let sub = primeira - segunda;
    return sub;
}
function multiplicaNumeros(primeira, segunda){
    let multi = primeira * segunda;
    return multi;
}
function divideNumeros(primeira, segunda){
    let div = primeira / segunda;
    return div;
}
function modNumeros(primeira, segunda){
    let mod = primeira % segunda;
    return mod;
}

function parOuImpar(mod){ 
    if(mod == 0){
        return "Par";
    }else{
        return "Impar";
    }
}