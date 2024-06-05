#include <stdio.h>

int main() {
    int n, cont=1;
    
    printf("N:");
    scanf("%d", &n);
    
    while (cont < n) {
        printf("%i\n", cont);
        cont++;
    }
    return 0;
}