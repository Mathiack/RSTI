#include <stdio.h>

int main() {
    int n, cont=1, div3, div5, divVerdadeiro;
    
    printf("N:");
    scanf("%d", &n);
    
    while (cont < n) {
        printf("%i\n", cont);
        cont++;
    }
    
    if (n % 3 == 0 && n % 5 == 0) {
        printf("Divisivel por 3 e 5\n");
    } else if (n % 5 == 0 ) {
        printf("Divisivel por 5\n");
    } else if (n % 3 == 0) {
        printf("Divisivel por 3\n");
    } else {
        printf("Não divisivel por 3 e 5\n");
    }
    return 0;
}