#include <stdio.h>

int main() {
    char nome[30];
    int idade;
    printf("Nome: ");
    scanf("%s", &nome);
    printf("Idade: ");
    scanf("%i", &idade);
    
    printf("Nome: %s\n", nome);
    printf("Idade: %i\n", idade);
    
    if (idade >= 18) {
        printf("Você é maior de idade.\n");
    } else {
        printf("Você é menor de idade.\n");
    }
    return 0;
}