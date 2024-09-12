programa {
  funcao inicio() {
    real altura, peso, imc

    escreva("Seu peso em KG: ")
    leia(peso)
    escreva("Sua altura em M: ")
    leia(altura)

    imc = peso / (altura * altura)

    escreva("IMC: " + imc)
  }
}