#include <stdio.h>

int main() {
    int idade;
    char categoria[100];
    printf("Idade: ");
    scanf("%i", &idade);
    
    if (idade >= 5 && idade <= 10) {
        categoria = "infantil";
    } else if (idade >= 11 && idade <= 17) {
        categoria = "juvenil";
    } else if (idade >= 18 && idade <= 30) {
        categoria = "profissional";
    } else if (idade > 30) {
        categoira = "sênior";
    }
    
    printf("Idade: %i", &idade);
    printf("Categoria: %s", &categoria);
    
    return 0;
}