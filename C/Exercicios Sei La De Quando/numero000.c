#include <stdio.h>

int main() {
    float n1, n2, n3, soma;
    
    printf("Mete o primeiro número: \n");
    scanf("%f", &n1);
    printf("Mete o segundo número: \n");
    scanf("%f", &n2);
    printf("Mete o terceiro número: \n");
    scanf("%f", &n3);
    
    soma = n2 + n3;
    
    if(n1 > soma) {
        printf("N1 maior.\n");
    } else if (soma > n2) {
        printf("Soma maior.\n");
    } else {
        printf("Iguais.\n");
    }
    return 0;
}