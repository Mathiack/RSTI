#include <stdio.h>
//NÃO TERMINADO
int main() {
    float valorCusto, valImpostoPer = 0.45, valDistribuidoraPer = 0.12;
    float valorImp, valorDist, valorFinal;
    
    printf("Preco do carro: ");
    scanf("%f", &valorCusto);
    
    valorImp = valorCusto * valImpostoPer;
    valorDist = valorCusto * valDistribuidoraPer;
    valorFinal = valorCusto + valorDist + valorImp;
    
    printf("Preço: %f ",  &valorCusto);
    printf("Imposto: %f ", &valorImp);
    printf("Distribuidora: %f ", &valorDist);
    printf("Valor final: %f ", &valorFinal);
    return 0;
}
