#include <stdio.h>

int main() {
    float prova1, prova2, prova3, media;
    
    printf("P1: ");
    scanf("%f", &prova1);
    printf("P2: ");
    scanf("%f", &prova2);
    printf("P3: ");
    scanf("%f", &prova3);
    
    media = (prova1 + prova2 + prova3) / 3;
    if (media >= 7) {
        printf("Aprovado.\n");
    } else if (media >= 5 && media < 7) {
        printf("Recuperação.\n");
    } else {
        printf("Reprovado.\n");
    }
    
    printf("Media: %f\n", media);
    return 0;
}