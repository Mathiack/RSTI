#include <stdio.h>

int main() {
    float n1, n2;
    
    printf("Mete o primeiro número: \n");
    scanf("%f", &n1);
    printf("Mete o segundo número: \n");
    scanf("%f", &n2);
    
    if(n1 > n2) {
        printf("N1 maior.\n");
    } else if (n2 > n1) {
        printf("N2 maior.\n");
    } else {
        printf("Iguais.\n");
    }
    return 0;
}