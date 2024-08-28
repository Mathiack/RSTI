#include <stdio.h>
#include <string.h>
//NÃO TERMINADO
int main() {
    float precNormal, diaSemana, precComDesconto, precComMusica;
    char sim[1];
    
    printf("Qual o preço normal: ");
    scanf("%f", &precNormal);
    printf("Qual o dia da Semana: ");
    scanf("%f", &diaSemana);
    printf("É música ao vivo (S ou N): ");
    scanf("%s", &sim);
    
    if (diaSemana == 2 || diaSemana == 3 || diaSemana == 5 && strcmp(sim, "S") == 0) {
        precComDesconto = precNormal * (25/100);
        precComMusica = precComDesconto * (15/100);
        printf("\nO preço hj é: %f", precComMusica);
        printf("\nCom música ao vivo.");
        
    } else if (diaSemana == 2 || diaSemana == 3 || diaSemana == 5 && strcmp(sim, "N")){
        precComDesconto = precNormal * (25/100);
        printf("\nO preço hj é: %f", precComDesconto);
        printf("\nSem música ao vivo.");
    } else {
        printf("a sla man");
    }

    return 0;
}

/*Em uma danceteria o preço da entrada sofre variações. Segunda, Terça e Quinta (2,
3 e 5), ela oferece um desconto de 25% do preço normal de entrada. Nos dias de
músicas ao vivo, o preço da entrada ainda é acrescido em 15% em relação ao preço
normal da entrada. Fazer um programa que leia o preço normal da entrada, o dia da
semana (1a 7) e se é dia de música ao vivo (1) ou não (2). Calcular e imprimir o
preço final que deverá ser pago pela entrada.*/