#include <stdio.h>
//NÃO TERMINADO
int main() {
    int notas[10];
    int val, soma = 0;
    float media;
    
    for (int i = 1; i <=10; i++) {
        printf("Nota %i: ", i);
        scanf("%i", &notas);
        notas[i] = val;
        soma += val;
    }
    media = soma / 10;
    for (int i = 1; i <= 10; i++) {
        if (notas[i] > media) {
            printf("\nAprovado / Nota: %i", notas[i]);
        } else {
            printf("\nReprovado / Nota: %i", notas[i]);
        }
    }
    
    printf("\n\nMedia da Turma: %f", media);

    return 0;
}
/*Faça um programa que leia a nota de 10 alunos. Faça a média da turma. Imprima a
média e posteriormente a nota dos 10 alunos verificando que o mesmo foi aprovado ou
reprovado. Os alunos que tirarem nota igual ou superior a média serão aprovados.
Imprimir a nota de cada aluno junto sua situação.*/