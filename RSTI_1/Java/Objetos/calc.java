/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.objetos;

public class calc {
    double a;
    double b;
    
    public calc(double a, double b) {
        this.a = a;
        this.b = b;
    }
    
    public double getA() {
        return a;
    }
    public void setA() {
        this.a = a;
    }
    
    public double getB() {
        return b;
    }
    public void setB() {
        this.b = b;
    }
    
    public double Somar(){
        double soma = this.a + this.b;
        return soma;
    }
    public double Subtrair(){
        double menos = this.a - this.b;
        return menos;
    }
    public double Dividir(){
        double div = this.a / this.b;
        return div;
    }
    public double Multiplicar(){
        double multi = this.a * this.b;
        return multi;
    }
}
