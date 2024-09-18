programa {
  funcao inicio() {
    real valT, valFinal, valF
    cadeia pg

    escreva("Valor Total: ")
    leia(valT)
    escreva("Forma de pagamento: ")
    leia(pg)

    se(valT > 500) {
      valFinal = valT * 1.15
    } senao se (valT >= 200 e valT < 500) {
      valFinal = valT * 1.10
    } senao se (valT < 200) {
      valFinal = valT * 1.05
    }
    
    se(pg == "a vista" ou "à vista") {
      valF = valFinal * 1.05
      escreva("Pagamento à vista\n")
    } senao {
      escreva("Outro")
    }
    escreva("Valor Final: " + valF)
  }
}
