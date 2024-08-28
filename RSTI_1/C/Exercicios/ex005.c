#include <stdio.h>

int main() {
    float nota1, nota2, nota3, media;
    
    printf("Nota1: ");
    scanf("%f", &nota1);
    printf("Nota2: ");
    scanf("%f", &nota2);
    printf("Nota3: ");
    scanf("%f", &nota3);
    
    media = (nota1 + nota2 + nota3) / 3;
    
    printf("A media é: %f", media);
    
    if (media >= 6) {
        char string[100] = "\nAprovado";
        printf("%s", string);
    } else {
        char string[100] = "\nReprovado";
        printf("%s", string);
    }
    
    return 0;
}