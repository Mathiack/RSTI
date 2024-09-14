programa {
  funcao inicio() {
    real renda_C, valor_Saque, valor_S_Max

    escreva("Insira sua renda: ")
    leia(renda_C)
    se(renda_C >= 2500) {
      escreva("Habilitado\n\n")
    } senao {
      escreva("Não podes sacar\n\n")
    }

    escreva("Insira quantos queres sacar: ")
    leia(valor_Saque)

    valor_S_Max = renda_C * 0.50
    
    se(valor_Saque > valor_S_Max) {
      escreva("Você não pode sacar tanto")
    } senao se(valor_Saque < valor_S_Max) {
      escreva("Confirmado")
    }
  }
}
