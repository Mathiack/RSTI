<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    String nome = request.getParameter("nome");
    String email = request.getParameter("email");
    String dataN = request.getParameter("dataN");
    String genero = request.getParameter("genero");
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1><%out.print(nome);%></h1>
        <h1><%out.print(email);%></h1>
        <h1><%out.print(dataN);%></h1>
        <h1><%out.print(genero);%></h1>
    </body>
</html>
