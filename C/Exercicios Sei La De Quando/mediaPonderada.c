#include <stdio.h>

int main() {
    float prova1, prova2, prova3, peso1 = 2, peso2 = 3, peso3 = 5, media, somaPesos, somaProvas;
    
    printf("Nota 1: ");
    scanf("%f", &prova1);
    printf("Nota 2: ");
    scanf("%f", &prova2);
    printf("Nota 3: ");
    scanf("%f", &prova3);
    
    prova1 *= peso1;
    prova2 *= peso2;
    prova3 *= peso3;
    somaProvas = prova1, prova2, prova3;
    somaPesos = peso1, peso2, peso3;
    media = somaProvas / somaPesos;
    
    if (media > 8) {
        printf("Boa\n");
    } else if (media < 5) {
        printf("O monari ta te influenciando né\n");
    } 
    printf("Média: %f", media);
    
    return 0;
}