#include <stdio.h>

int main() {
    int numero, resto;
    
    printf("Numero: ");
    scanf("%f", &numero);
    resto = numero % 2;
    
    if (resto == 0) {
        printf("Par.\n");
    } else {
        printf("Negativo.\n");
    }
    
    if (numero > 0) {
        printf("Positivo.\n");
    } else if (numero < 0) {
        printf("Negativo.\n");   
    } else if (numero == 0) {
        printf("Nulo.");
    }
    return 0;
}