programa {
  funcao inicio() {
    real area, sementes
    escreva("Quantidade de sementes recomendada: ")
    leia(area)
    escreva("Qual a área em m²? ")
    leia(sementes)

    real area_sementes = area * sementes

    escreva("Em " + area + "m², você precisa de " + area_sementes + " sementes")
  }
}
