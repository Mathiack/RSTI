#include <stdio.h>

int main() {
    float velCarro, velAvenida, velMenos, valMulta;
    
    printf("Veiculo: \n");
    scanf("%f", &velCarro);
    printf("Avenida: \n");
    scanf("%f", &velAvenida);
    
    velMenos = velCarro - velAvenida;
    
    if (velCarro > velAvenida) {
        if (velMenos <= 10) {
            valMulta = 50;
            printf("Tua multa é de: %f", valMulta);
        } else if (10 < velMenos <= 30) {
            valMulta = 100;
            printf("Tua multa é de: %f", valMulta);
        } else if (velMenos > 30) {
            valMulta = 200;
            printf("Tua multa é de: %f", valMulta);
        }
        
    } else {
        printf("Blz");
    }
    return 0;
}