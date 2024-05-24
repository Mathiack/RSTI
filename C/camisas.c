#include <stdio.h>

int main() {
    float quantidade, camisa = 25, valorTotal;
    
    printf("Quantas? ");
    scanf("%f", &quantidade);
    
    valorTotal = camisa * quantidade;
    
    printf("%f", valorTotal);
    
    return 0;
}