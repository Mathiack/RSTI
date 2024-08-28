#include <stdio.h>

int main() {
    float num1, num2, num3, media;
    
    printf("N1: ");
    scanf("%f", &num1);
    printf("N2: ");
    scanf("%f", &num2);
    printf("N3: ");
    scanf("%f", &num3);
    
    media = (num1 + num2 + num3) / 3;
    
    printf("%f", media);
    
    return 0;
}