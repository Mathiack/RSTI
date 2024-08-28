#include <stdio.h>

int main() {
    int nota;
    
    printf("Nota:");
    scanf("%i", &nota);
    
    if (nota >= 60) {
        printf("Passou.");
    } else {
        printf("Reprovado.");
    }
    return 0;
}