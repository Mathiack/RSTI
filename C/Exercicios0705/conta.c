#include <stdio.h>

int main() {
    float nConta, saldo, debito, credito, saldoAtual;
    
    printf("N da Conta: ");
    scanf("%f", &nConta);
    printf("Saldo: ");
    scanf("%f", &saldo);
    printf("Débito: ");
    scanf("%f", &debito);
    printf("Crédito: ");
    scanf("%f", &credito);
    
    saldoAtual = saldo - debito + credito;
    
    printf("%f", saldoAtual);
    
    if (saldoAtual > 0) {
        printf("\nSaldo positivo");
    } else {
        printf("\nSaldo negativo");
    }
    return 0;
}
/*Faça um algoritmo para ler: número da conta do cliente, saldo, débito e crédito.
Após, calcular e escrever o saldo atual (saldo atual = saldo - débito + crédito).
Também testar se saldo atual for maior ou igual a zero escrever a mensagem 'Saldo
Positivo', senão escrever a mensagem 'Saldo Negativo'*/