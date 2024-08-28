#include <stdio.h>

int main() {
    int num;
    float n; 
    char string[100];
    
    printf("Int:");
    scanf("%d", &num);
    
    printf("Float:");
    scanf("%f", &n);
    
    printf("String:");
    scanf("%s", &string);
    
    printf("\nInt: %d", num);
    printf("\nFloat: %f", n);
    printf("\nString: %s", string);
    
    return 0;
}