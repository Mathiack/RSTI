#include <stdio.h>

int main() {
    int num1, num3;
    float num2;
    
    printf("Num1:");
    scanf("%i", &num1);
    printf("Num2:");
    scanf("%i", &num2);
    printf("Num3:");
    scanf("%i", &num3);
    printf("------------\n");
    if (num1 > 0) {
        printf("Num1: Positivo\n");
    } else if (num1 < 0) {
        printf("Num1: Negativo\n");
    } else {
        printf("\nNum1: Zero\n");
    }
    printf("------------\n");
    if (num2 < 10) {
        printf("Num2: Menor que 10\n");
    } else if (num2 > 10) {
        printf("Num2: Maior que 10\n");
    }
    printf("------------\n");
    printf("Num 3: %i\n", num3);
    printf("------------\n");
    
    return 0;
}