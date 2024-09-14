programa {
  funcao inicio() {
    real num, fh

    escreva("Insira a temperatura em Celsius: ")
    leia(num)

    fh = (num * 1.8) + 32

    escreva("Sua temperatura em Fahrenheit é: " + fh + "°F")
  }
}
