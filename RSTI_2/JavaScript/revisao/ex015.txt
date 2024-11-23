// 15. Loop for para criar um tabuleiro de xadrez.
let tabuleiro = "";
for (let linha = 0; linha < 8; linha++) {
    for (let coluna = 0; coluna < 8; coluna++) {
        tabuleiro += (linha + coluna) % 2 === 0 ? " " : "#";
    }
    tabuleiro += "\n";
}
console.log(tabuleiro);
