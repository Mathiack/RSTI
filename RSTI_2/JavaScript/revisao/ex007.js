// 7. Percorrer um array com for, while e do..while.
let nums = [1, 2, 3, 4, 5];
for (let i = 0; i < nums.length; i++) {
    console.log(nums[i]);
}

let i = 0;
while (i < nums.length) {
    console.log(nums[i]);
    i++;
}

i = 0;
do {
    console.log(nums[i]);
    i++;
} while (i < nums.length);
