programa {
  funcao inicio() {
    cadeia categoria_P
    real valor_P, imposto_P

    escreva("Insira a categoria do produto: ")
    leia(categoria_P)
    escreva("Insira o valor do produto: ")
    leia(valor_P)

    se(categoria_P == "A" ou categoria_P == "a") {
      imposto_P = (valor_P * 0.12) + valor_P
      escreva("Você foi taxado em 12%, seu produto sai por: " + imposto_P + "  reais.")
    } senao se (categoria_P == "B" ou categoria_P == "b") {
      imposto_P = (valor_P * 0.08) + valor_P
      escreva("Você foi taxado em 8%, seu produto sai por: " + imposto_P + " reais.")
    }
  }
}
