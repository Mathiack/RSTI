/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.contabanco;

public class Conta {
    
    /*STRING*/
    private String banco;
    private String nomeP;
    
    /*INT*/
    public int n;
    
    /*DOUBLE*/
    private double saldo;
    private double limite;
    
    
    public Conta (int n, String nomeP, String banco) {
        this.n = n;
        this.nomeP = nomeP;
        this.saldo = 0.0;
        this.limite = 0.0;
    }

    /* ----- GETTERS E SETTERS ----- */

    /**
     * @return the banco
     */
    public String getBanco() {
        return banco;
    }

    /**
     * @param banco the banco to set
     */
    public void setBanco(String banco) {
        this.banco = banco;
    }

    /**
     * @return the nomeP
     */
    public String getNomeP() {
        return nomeP;
    }

    /**
     * @param nomeP the nomeP to set
     */
    public void setNomeP(String nomeP) {
        this.nomeP = nomeP;
    }

    /**
     * @return the n
     */
    public int getN() {
        return n;
    }

    /**
     * @param n the n to set
     */
    public void setN(int n) {
        this.n = n;
    }
    
    public String deposito(double valor) {
        double saldoA = this.saldo;
        double novoSaldo = saldoA + valor;
        this.saldo = novoSaldo;
        return "Depósito efetuado com sucesso";
    }
    
    public String saque(double valor) {
        double saldoA = this.saldo;
        double novoSaldo = saldoA;
        String msg = "";
        if (saldoA >= valor) {
            novoSaldo = saldoA - valor;
            msg = "Saque efetuado com sucesso";
        } else {
            msg = "Saldo insuficiente para sacar";
        }
        this.saldo = novoSaldo;
        return msg;
    }
    
    public String printSaldo() {
        String msg = "<h3>Saldo da Conta: " + this.saldo + "<h3>" +
                    "<h2>Correntista: " + this.nomeP + "</h2>" +
                    "<h2>Banco: " + this.banco + "</h2>" +
                    "<h2>Número: " + this.n + "</h2>" +
                    "<h2>Limite: " + this.limite + "</h2>";
        return msg;
    }
}
