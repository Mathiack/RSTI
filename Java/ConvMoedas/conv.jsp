<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    double valDolar = Double.parseDouble(request.getParameter("valor"));
    
    double valReais = valDolar * 5.6;
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>O teu valor em Dólares é: <% out.print(valReais);%></h1>
    </body>
</html>
