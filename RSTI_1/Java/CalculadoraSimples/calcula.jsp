<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    double n1 = Double.parseDouble(request.getParameter("n1"));
    double n2 = Double.parseDouble(request.getParameter("n2"));
    
    double soma = n1 + n2;
    double sub = n1 - n2;
    double multi = n1 * n2;
    double div = n1 / n2;
    
    String operacoes = request.getParameter("operacoes");
    
    if(operacoes == "Somar") {
        out.print("Tua soma é: " + soma);
    } else if(operacoes == "Subtrair") {
        out.print("Tua subtração é: " + sub);
    } else if(operacoes == "Multiplicar") {
        out.print("Tua multiplicação é: " + multi);
    } else if(operacoes == "Dividir"){
        out.print("Tua divisão é: " + div);
    }
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
                double res = 0;
                if(operacoes.equals("Somar")) {
                    res = soma;
                } else if(operacoes.equals("Subtrair")) {
                    res = sub;
                } else if(operacoes.equals("Multiplicar")) {
                    res = multi;
                } else if(operacoes.equals("Dividir")){
                    res = div;
                }
            %>
        <h1>
            O resultado é <% out.print(res);%>
        </h1>
        <a href="index.jsp">Voltar</a>
    </body>
</html>
