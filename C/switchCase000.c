#include <stdio.h>
//NÃO TERMINADO
int main() {
    float numero;
    
    printf("Bota 1, 2, ou 3:\n");
    scanf("%f", &numero);
    
    switch (numero) {
        case 1:
            printf("1\n");
            break;
        case 2:
            printf("2\n");
            break;
        case 3:
            printf("3\n");
            break;
        default:
            printf("Nada");
    }
    
    return 0;
}