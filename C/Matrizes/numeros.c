#include <stdio.h>

int main() {
    int vetor[100], valor, v[100];
    for (int i = 1; i <= 100 ; i++) {
        printf("Número: ");
        scanf("%d", &valor);
        vetor[i] = valor;
        if (valor % 2 == 0) {
            v[i] = 0;
        } else {
            v[i] = 1;
        }
    }
    for(int i = 1; i <= 100; i++){
        printf("Posição: %d | %d |\n",i, v[i]);   
    }
    
    return 0;
}
/*
Escreva um algoritmo que preencha um vetor de 100 elementos inteiros, colocando 0 na
posição correspondente a um número par e 1 na posição correspondente a um número
ímpar.
*/