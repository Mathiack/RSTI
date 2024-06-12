#include <stdio.h>
 
int main() {

    int notas[44];
    char nomeAluno[10][100], nome[100], nomeTurma[100];
    int valor, aprovados = 0, reprovados = 0, emRec = 0;
    float media = 0, soma = 0, somaTurma = 0;
        printf("Nome Turma: ");
        scanf ("%s",&nomeTurma);
        for(int i = 1 ; i <= 2; i++){
            printf("%d Nome Aluno: ", i);
            scanf ("%s",&nomeAluno);
            printf("---------------\n");
            for(int j = 1; j <= 4; j++){
            printf("%d Nota: ", j);
            scanf ("%d",&valor);
            notas[j] = valor;
            soma+=valor;
            somaTurma+=valor;
            }
            media = soma / 4;
            soma = 0;
            printf("----------------------------------------------\n");

            if(media >= 7){
                aprovados++;
                printf("Aluno %s", nomeAluno);
                for(int p = 1; p <= 4; p++){
                    printf(" - %d", notas[p]);
                }
                
            printf(" - %f - Aprovado\n", media);
            printf("----------------------------------------------\n");

            }else{
                printf("Aluno %s", nomeAluno);
                for(int p = 1; p <= 4; p++){
                    printf(" - %d", notas[p]);
                }
                
            printf(" - %f - Reprovado \n", media);
            printf("----------------------------------------------\n");

        }
        if(media < 7 & media >= 4){
            emRec++;
        }
        }
    media = somaTurma / 8;
    printf("Turma %s", nomeTurma);
    printf("\nMedia Turma: %f", media);
    printf("\nAprovados : %d", aprovados);
    printf("\nReprovados : %d", reprovados);
    printf("\nEm recuperação : %d", emRec);


    return 0;
}