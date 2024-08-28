#include <stdio.h>

int main() {
    float area, sementes = 8, totalSementes;
    
    printf("Área: ");
    scanf("%f", &area);
    
    totalSementes = sementes * area;
    
    printf("%f", totalSementes);
    
    return 0;
}