#include <stdio.h>
#include <string.h>

int main() {
    int qntItens, perc = 0;
    float desconto, preco, total_com_desconto = 0, total_sem_desconto= 0, valor_descontado= 0;
    char tipo_cliente[100];
    printf("Quantidade Itens: ");
    scanf("%d", &qntItens);
    printf("Desconto: ");
    scanf("%f", &desconto);
    printf("Preco: ");
    scanf("%f", &preco);
    printf("Tipo Cliente (regular ou vip): ");
    scanf("%s", &tipo_cliente);
    total_sem_desconto = qntItens * preco;
    if(qntItens <= 0){
        printf("\nERROR 404");
        
    }
    if(preco <= 0.0){
        printf("\nERROR 405");
        
    }
    if(strcmp(tipo_cliente,"vip")==0){
        printf("Cliente VIP with DESCONTO the 5%!");
        perc = 0.05;


    }else if(tipo_cliente == "regular"){
        printf("Cliente REGULAR one hundred DESCONTO!");
        perc = 0;
    }
    valor_descontado = total_sem_desconto - (total_sem_desconto * (desconto / 100));
    total_com_desconto = valor_descontado - (total_sem_desconto * perc);
    printf("\nTotal one hundred Desconto: %f", total_sem_desconto);
    printf("\nValor Descontado: %f", valor_descontado);
    printf("\nTotal with Desconto: %f", total_com_desconto);
    return 0;
}