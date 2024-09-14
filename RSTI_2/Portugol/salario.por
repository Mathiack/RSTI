programa {
  funcao inicio() {
    real salario, salario_novo

    escreva("Insira o salário: ")
    leia(salario)

    se(salario < 1000) {
      salario_novo = (salario * 0.10) + salario
    } senao {
      salario_novo = (salario * 0.08) + salario
    }

    escreva("O novo salário é de: R$" + salario_novo)
  }
}
