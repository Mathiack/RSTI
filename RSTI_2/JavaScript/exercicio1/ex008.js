let n = 5;

function factorial(n) {
  let result = 1;
  for (let i = 1; i <= n; i++) {
    result *= i;
  }
  return result;
}

console.log("5! =" + factorial(5)); // Output: 120s