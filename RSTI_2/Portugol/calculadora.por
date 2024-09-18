programa { // não está mostrando a resposta
  funcao inicio() {
    real a, b
    cadeia op
    
    escreva("A: ")
    leia(a)
    escreva("B: ")
    leia(b)
    escreva("Operação: ")
    leia(op)

    se(op == "soma" ou "+") {
      escreva(soma(a, b))
    } senao se(op == "subtracao" ou "-") {
      escreva(sub(a, b))
    } senao se(op == "multiplicacao" ou "*") {
      escreva(multi(a, b))
    } senao se(op == "divisao" ou "/") {
      escreva(div(a, b))
    }

  }

  funcao real soma(real a, real b) {
    retorne a + b
  }

  funcao real sub(real a, real b) {
    retorne a - b
  }

  funcao real multi(real a, real b) {
    retorne a * b
  }

  funcao real div(real a, real b) {
    retorne a / b
  }
}
