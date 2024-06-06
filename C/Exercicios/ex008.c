#include <stdio.h>

int main() {
    int n, cont=1, soma, media;
    
    printf("N:");
    scanf("%d", &n);
    
    for (int cont = 1; cont <= n; cont++) {
        soma += cont;
    }
    printf("Soma: %d\n", soma);
    
    media = soma / n;
    printf("Media: %d\n", media);
    return 0;
}