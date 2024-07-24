/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.salarios;

public class Contas {
    private String receitas;
    private String despesas;
    private double saldo;
    private int mes;
    
    public void Conta (String receitas, String despesas, double saldo, int mes) {
        this.receitas = receitas;
        this.despesas = despesas;
        this.saldo = saldo;
        this.mes = mes;
    }

    /**
     * @return the receitas
     */
    public String getReceitas() {
        return receitas;
    }

    /**
     * @param receitas the receitas to set
     */
    public void setReceitas(String receitas) {
        this.receitas = receitas;
    }

    /**
     * @return the despesas
     */
    public String getDespesas() {
        return despesas;
    }

    /**
     * @param despesas the despesas to set
     */
    public void setDespesas(String despesas) {
        this.despesas = despesas;
    }

    /**
     * @return the saldo
     */
    public double getSaldo() {
        return saldo;
    }

    /**
     * @param saldo the saldo to set
     */
    public void setSaldo(double saldo) {
        this.saldo = saldo;
    }

    /**
     * @return the mes
     */
    public int getMes() {
        return mes;
    }

    /**
     * @param mes the mes to set
     */
    public void setMes(int mes) {
        this.mes = mes;
    }
    
    public void calcSaldo() {
        
    }
}
