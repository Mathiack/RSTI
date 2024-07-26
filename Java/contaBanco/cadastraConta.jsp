<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        <form action="listas.jsp" method="post">
            <label for="nome" id="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <br>
            
            <label for="banco" id="banco">Banco</label>
            <input type="text" name="banco" id="banco">
            <br>
            
            <label for="saldoD" id="saldoD">Saldo Para Depósito</label>
            <input type="text" name="saldoD" id="saldoD">
            <br>
            
            <input type="submit" value="Enviar"
        </form>
    </body>
</html>
