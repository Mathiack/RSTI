<%-- 
    Document   : dadosFuncionario
    Created on : 19 de jul. de 2024, 15:34:14
    Author     : Administrador
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Bom dia</h1>
        <form action="processa.jsp" method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome">
            <br>
            
            <label for="dataEnt">Data de Entrada</label>
            <input type="text" id="dataEnt" name="dataEnt">
            <br>
            
            <label for="function">Função</label>
            <select name="funcao">
                <option id="prod">Produção</option>
                <option id="com">Comercial</option>
                <option id="finan">Financeira</option>
                <option id="rh">RH</option>
                <option id="ger">Gerência</option>
            </select>
            <br>
            
            <label for="horaExt">Horas Extras Do Mês</label>
            <input type="text" id="horaExt" name="horaExt">
            <br>
            
            <label for="mes">Mês</label>
            <input type="text" id="mes" name="mes">
            <br>
            
            <label for="ano">Ano: </label>
            <input type="text" id="ano" name="ano">
            <br>
            
            <label for="valeAlim">Vale Alimentação</label>
            <input type="checkbox" id="valeAlim" name="valeAlim">
            <br>
            
            <label for="qntDep">Dependentes</label>
            <input type="text" id="qntDep" name="qntDep">
            <br>
            
            <input type="submit" value="Concluir">
        </form>
    </body>
</html>
<!<!--
  O formulário conterá o nome do funcionário, a data de entrada na empresa, um campo
de seleção contendo as funções: produção; comercial; financeira; recursos humanos;
gerência, quantidade de horas extras realizadas no mês, mês de referência, ano de
referência, um checkbox para verificar se ele utiliza vale transporte, um checkbox para
verificar se ele utiliza vale alimentação, um campo para quantidade de dependentes e
um campo para informações sobre possíveis descontos.
-->