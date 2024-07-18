<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Calculadora Simples</h1>
        <form action="calcula.jsp">
            <label for="n1">Número 1</label><br>
            <input type="text" id="n1" name="n1"><br>
            <label for="n2">Número 2</label><br>
            <input type="text" id="n2" name="n2"><br>
            <label for="operacao">Operação</label><br>
            <select name="operacoes">
                <option id="Somar">Somar</option>
                <option id="Subtrair">Subtrair</option>
                <option id="Multiplicar">Multiplicar</option>
                <option id="Dividir">Dividir</option>
            </select>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
