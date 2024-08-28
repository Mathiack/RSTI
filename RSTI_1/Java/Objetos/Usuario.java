/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.objetos;

public class Usuario {
    private String nome;
    private int idade;
    private String sexo;
    
    //Construtor
    public Usuario(String nome,int idade, String sexo) {
        this.nome = nome;
        this.idade = idade;
    }
    
    public String getNome(){
        return nome;
    }
    public void setNome(String nome) {
        this.nome = nome;
    }
    
    public int getIdade() {
        return idade;
    }
    public void setIdade(int idade) {
        this.idade = idade;
    }
    
    public String getSexo(){
        return sexo;
    }
    public void setSexo(String sexo) {
        this.sexo = sexo;
    }
    
    public String imprimir(){
        return "Nome: " + this.nome + "<br> Idade: " + this.idade + "<br> Sexo: " + this.sexo;
    }
}
