#include <stdio.h>

int main() {
    float valMaxPrest, salBruto, valPrest;
    
    printf("Salário Bruto: ");
    scanf("%f", &salBruto);
    printf("Valor da Prestação: ");
    scanf("%f", &valPrest);
    
    valMaxPrest = salBruto * (30/100);
    
    if (valPrest > valMaxPrest) {
        printf("Pode n man");
    } else {
        printf("Tome");
    }
    
    return 0;
}
/*A prefeitura de Aparecida de Goiânia abriu uma linha de crédito para os funcionários
estatutários. O valor máximo da prestação não poderá ultrapassar 30% do salário
bruto. Fazer um algoritmo que permita entrar com o salário bruto e o valor da
prestação e informar se o empréstimo pode ou não ser concedido*/