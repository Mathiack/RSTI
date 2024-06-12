#include <stdio.h>
#include <string.h>

int area(int larg, int alt) {
    int area = larg * alt;
    printf("A Área é: %d\n", area);
    return area;
}

int perimetro(int larg, int alt) {
    int perimetro = 2 * (larg + alt);
    printf("O Perímetro é: %d\n", perimetro);
    return perimetro;
}

int main() {
    char decisao[2];
    int larg, alt;
    
    printf("Bota a largura: ");
    scanf("%d", &larg);
    printf("Bota a altura: ");
    scanf("%d", &alt);
    
    printf("A ou P? ");
    scanf("%s", decisao);
    
    if (strcmp("A",decisao) == 0) {
        area(larg, alt);
    } else if (strcmp("P",decisao) == 0 ){
        perimetro(larg, alt);
    } else {
        printf("Ping Pong\n");
    }
    return 0;
}
