#include <stdio.h>

int main() {
    int a[5], vA;
    int b[5], vB;
    int res[5];
    
    for (int i = 1; i <=5; i++) {
        printf("A: ");
        scanf("%d", &vA);
        printf("B: ");
        scanf("%d", &vB);
        
        a[i] = vA;
        b[i] = vB;
        
        int soma = vA + vB;
        res[i] = soma;
    }
    for (int i = 1; i <=5; i++) {
        printf("\nVal Res: %d", res[i]);   
    }
    
    /*printf("\nA: %i", a[5]);
    printf("\n----------");
    printf("\nB: %i", b[5]);*/
    
    return 0;
}
/*Faça um programa que:
- a) preencha dois vetores a e b de cinco posições, com números inteiros;
- b) atribua a um vetor res à soma do vetor a com b (a primeira posição de a será somada
     à primeira posição de b e o resultado será atribuído à primeira posição do vetor res);
- c) mostre os valores do vetor res.*/