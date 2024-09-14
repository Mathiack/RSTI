programa {
  funcao inicio() {
    real prova1, prova2, prova3, mediaP
    real pesoP1 = 2
    real pesoP2 = 3
    real pesoP3 = 5
    
    escreva("Nota da prova 1: ")
    leia(prova1)
    escreva("Nota da prova 2: ")
    leia(prova2)
    escreva("Nota da prova 3: ")
    leia(prova3)
    
    mediaP = ((prova1 * pesoP1) + (prova2 * pesoP2) + (prova3 * pesoP3)) / (pesoP1 + pesoP2 + pesoP3)

    escreva("Sua média é: " + mediaP)
  }
}
