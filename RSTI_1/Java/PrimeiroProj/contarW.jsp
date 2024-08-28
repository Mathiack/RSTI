<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>While</title>
    </head>
    <body>
        <%
            int i = 0;
            while(i <= 9) {
                i++;
                out.print(i + "<br>");
            }
        %>
        <br>
        <a href="index.jsp">Voltar</a>
    </body>
</html>
