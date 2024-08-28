<%@page import="com.mycompany.objetos.calc"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Calculadora</h1>
        <%
            double a = 5.0;
            double b = 5.0;
            double res = 0;
            calc c = new calc(a, b);

            c.setA(7.0);
            
            //res = c.Somar();
            //res = c.Subtrair();
            //res = c.Multiplicar();
            //res = c.Dividir();
        %>
        <h1>Teu resultado é: <strong><%out.print(res);%></strong></h1>
    </body>
</html>
