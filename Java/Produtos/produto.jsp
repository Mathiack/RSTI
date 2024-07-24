<%@page import="com.mycompany.produtos.Produto"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Produtos</h1>
        <%
            Produto p = new Produto();
            
            String nome = request.getParameter("nome");
            double preco = Double.parseDouble(request.getParameter("preco"));
            double lucro = Double.parseDouble(request.getParameter("lucro"));
        %>
        
        <h3>Nome do Produto: <%= p.getNomeProduto()%></h3>
        <p>Valor do Produto: <%= p.getValorProduto() %></p>
        <p>Lucro: <%= p.getLucro() %></p>
                
    </body>
</html>
