#include <stdio.h>

int main() {
    int n, cont=1;
    
    printf("N:");
    scanf("%d", &n);
    
    while (cont < n) {
        printf("%i\n", cont);
        cont++;
    }
    printf("%d", n);
    return 0;
}