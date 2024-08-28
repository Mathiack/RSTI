/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.produtos;

public class Produto {
    private String nomeProduto;
    private double valorProduto;
    private double lucro;
    private double valorVenda;
    
    public void Produto (String nomeProduto) {
        this.nomeProduto = nomeProduto;
    }

    /**
     * @return the nomeProduto
     */
    public String getNomeProduto() {
        return nomeProduto;
    }

    /**
     * @param nomeProduto the nomeProduto to set
     */
    public void setNomeProduto(String nomeProduto) {
        this.nomeProduto = nomeProduto;
    }

    /**
     * @return the valorProduto
     */
    public double getValorProduto() {
        return valorProduto;
    }

    /**
     * @param valorProduto the valorProduto to set
     */
    public void setValorProduto(double valorProduto) {
        this.valorProduto = valorProduto;
    }

    /**
     * @return the lucro
     */
    public double getLucro() {
        return lucro;
    }

    /**
     * @param lucro the lucro to set
     */
    public void setLucro(double lucro) {
        this.lucro = lucro;
    }

    /**
     * @return the valorVenda
     */
    public double getValorVenda() {
        return valorVenda;
    }

    /**
     * @param valorVenda the valorVenda to set
     */
    public void setValorVenda(double valorVenda) {
        this.valorVenda = (this.valorProduto * this.lucro) + this.valorProduto;
    }
}
