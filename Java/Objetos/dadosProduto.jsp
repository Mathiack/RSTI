<%-- 
    Document   : dadosProduto
    Created on : 19 de jul. de 2024, 14:49:42
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
        <h1>Hello World!</h1>
        <form action="produto.jsp" method="post">
            <label for="nome">Nome do Produto: </label>
            <input type="text" id="nome" name="nome">
            <br>
            
            <label for="preco">Preco: </label>
            <input type="text" id="preco" name="preco">
            <br>
            
            <label for="lucro">Lucro: </label>
            <input type="text" id="lucro" name="lucro">
            <br>
             
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
