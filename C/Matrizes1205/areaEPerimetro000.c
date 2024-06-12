#include <stdio.h>
#include <string.h>

int main() {
    char decisao[1];
    float larg, alt, area, perimetro;
    
    printf("Bota a largura: ");
    scanf("%f", &larg);
    printf("Bota a altura: ");
    scanf("%f", &alt);
    
    printf("A ou P? ");
    scanf("%s", &decisao);
    
    area = (larg * alt);
    perimetro = (larg * 2) + (alt *2);
    
    if (strcmp("A",decisao) == 0) {
        printf("A Área é: %f", area);
    } else {
        printf("O Perímetro é: %f", perimetro);
    }
    return 0;
}
/*
Faça um  programa que utiliza funções para calcular a área e o perímetro de um
retângulo.
*/