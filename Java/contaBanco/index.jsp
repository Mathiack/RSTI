<%@page import="com.mycompany.contabanco.Conta"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Conta</title>
    </head>
    <body>
        <%
            Conta novaConta = new Conta(123, "Eu", "Caixa");
            out.print(novaConta.getNomeP());
            out.print("<br>");
            out.print(novaConta.getN());
            out.print("<br>");
            novaConta.n = 321; //alterando sem setter
            out.print(novaConta.getN());
            
            out.print("<p>Criando nova instância</p>");
            
            Conta c = new Conta(1, "Monas Com Paskso", "Santander");
            out.print(c.getNomeP());
            out.print("<br>");
            out.print(c.getN());
            out.print("<br>");
            out.print(c.getBanco());
                
            String msg = "";
            
            out.print(novaConta.deposito(150.00));
            msg = novaConta.deposito(200.00);
            out.print("<br>" + msg);
            out.print(novaConta.printSaldo());
            msg = novaConta.saque(50);
            out.print("<br>" + msg);
            out.print("<br>");
            out.print(novaConta.printSaldo());
            out.print("<br>");
            msg = novaConta.saque(450);
            out.print("<br>" + msg);
            out.print(novaConta.printSaldo());
        %>
    </body>
</html>
