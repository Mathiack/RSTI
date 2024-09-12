programa {
  funcao inicio() {
    real a, b
    escreva("A: ")
    leia(a)
    escreva("B: ")
    leia(b)

    se ( a > b) {
      escreva("A > B")
    } senao se (a == b){
      escreva("A = B")
    } senao se (b > a) {
      escreva("B > A")
    }
  }
}