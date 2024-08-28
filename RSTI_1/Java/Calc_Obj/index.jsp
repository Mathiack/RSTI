<%@page import="com.mycompany.calcobj.calc"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <%
            double n1 = Double.parseDouble(request.getParameter("n1"));
            double n2 = Double.parseDouble(request.getParameter("n2"));
            double res = 0;
            calc c = new calc(n1, n2);
        %>
    </head>
    <body>
        <h1>Calculadora Simples</h1>
        <form action="">
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
