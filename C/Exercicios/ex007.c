#include <stdio.h>

int main() {
    int n, cont=1, soma;
    
    printf("N:");
    scanf("%d", &n);
    
    while (cont <= n) {
        soma += cont;
        cont++;
    }
    printf("%d\n", soma);
    return 0;
}