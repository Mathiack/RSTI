#include <stdio.h>

int main() {
    int n, cont=1, soma;
    
    printf("N:");
    scanf("%d", &n);
    
    for (int cont = 1; cont <= n; cont++) {
        soma += cont;
    }
    printf("%d\n", soma);
    return 0;
}