#include <stdio.h>

int main() {
    int numeros[20];
    int valor;
    
    for (int i = 1; i <= 20; i++) {
        printf("N: ");
        scanf("%d", &valor);
        numeros[i] = valor;
    }
    
    for (int i = 20; i > 1; i--) {
        printf("\nNúmero %d: %d", i, numeros[i]);
    }
    return 0;
}
/*Faça um algoritmo para ler 20 números e armazenar em um vetor. Após a leitura
total dos 20números, o algoritmo deve escrever esses 20 números lidos na ordem
inversa.*/