#include <stdio.h>

int main() {
    char seila;
    
    printf("Bota s, ] ou * \n");
    scanf("%s", &seila);
    
    switch (seila) {
        case 's':
            printf("s\n");
            break;
        case ']':
            printf("]\n");
            break;
        case '*':
            printf("*\n");
            break;
        default:
            printf("Nada");
    }
    
    return 0;
}