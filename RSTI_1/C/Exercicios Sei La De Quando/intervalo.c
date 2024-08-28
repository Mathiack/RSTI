#include <stdio.h>
//NÃO TERMINE
int main() {
    int c = 1, contaIntervalo = 0, contaForaIntervalo = 0, n;
    
    while (c <= 10) {
        printf("Bota o número: ");
        scanf("%i", &n);
        
        if (10 <= n <= 50) {
            contaIntervalo++;
            printf("Intervalo.\n");
        } else {
            contaForaIntervalo++;
            printf("Fora.\n");
        }
        c++;
    }
    printf("Intevalo: \n%i", contaIntervalo);
    printf("Fora: \n%i", contaForaIntervalo);
    return 0;
}