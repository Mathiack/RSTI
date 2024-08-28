<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            for (int i = 1; i <=10; i++) {
                out.print(i + "<br>");
            }
        %>
        <br>
        <a href="index.jsp">Voltar</a>
    </body>
</html>
