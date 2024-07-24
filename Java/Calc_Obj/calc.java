/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.calcobj;

public class calc {
    
    double n1;
    double n2;
    
    public calc(double a, double b) {
        this.n1 = n1;
        this.n2 = n2;
    }
    
    public double getN1() {
        return n1;
    }
    public void setN1() {
        this.n1 = n1;
    }
    
    public double getN2() {
        return n2;
    }
    
    public void setN2() {
        this.n2 = n2;
    }
    
    public double Somar(){
        double soma = this.n1 + this.n2;
        return soma;
    }
    public double Subtrair(){
        double menos = this.n1 - this.n2;
        return menos;
    }
    public double Dividir(){
        double div = this.n1 / this.n2;
        return div;
    }
    public double Multiplicar(){
        double multi = this.n1 * this.n2;
        return multi;
    }
}
