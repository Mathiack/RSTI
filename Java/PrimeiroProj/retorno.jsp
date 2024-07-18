<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Retorno</title>
    </head>
    <body>
        <h1>Retorno dos Dados</h1>
        <%
            String nome = request.getParameter("nome");
            out.print("Bom dia " + nome);
        %>
        <br>
        <a href="index.jsp">Voltar ao Início</a>
    </body>
</html>
