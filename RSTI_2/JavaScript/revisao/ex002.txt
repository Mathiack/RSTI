// 2. Crie um array com 5 números
let numbers = [10, 20, 30, 40, 50];
console.log("Números: ", numbers); // [10, 20, 30, 40, 50]

// 2.1 - Use push() para adicionar um número ao final
numbers.push(60);
console.log("Após push:", numbers); // [10, 20, 30, 40, 50, 60]

// 2.2 - Use pop() para remover o último número
numbers.pop();
console.log("Após pop:", numbers); // [10, 20, 30, 40, 50]

// 2.3 - Concatene o array com outro array de 3 números
let extraNumbers = [70, 80, 90];
let combinedArray = numbers.concat(extraNumbers);
console.log("Array concatenado:", combinedArray); // [10, 20, 30, 40, 50, 70, 80, 90]
