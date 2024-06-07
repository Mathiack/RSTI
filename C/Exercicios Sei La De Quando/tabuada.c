#include <stdio.h>

int main() {
    float n, res, multi;
    int c = 1;
    
    printf("Bota um número:\n");
    scanf("%f", &n);
    
    while (c <=10) {
        multi = n * c;
        printf("%f\n", multi);
        c++;
    }
    
    return 0;
}