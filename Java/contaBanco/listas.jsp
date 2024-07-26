<%@page import="java.util.ArrayList"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            ArrayList<String> nomes = new ArrayList<>();
            
            nomes.add("Monas com Parkso");
            nomes.add("Guilherme RSTI");
            nomes.add("Angelico");
            nomes.add("Sigma do Sul");
            
            out.print("Elementos da lista: ");
            for (String nome : nomes) {
                out.print("<br>" + nome);
            }
            
            String nomeBusca = "Sigma do Sul";
            if (nomes.contains(nomeBusca)) {
                out.print("<p>" + nomeBusca + " está na lista</p>");
            } else {
                out.print("<p>" + nomeBusca + " não está na lista</p>");
            }
        %>
        <h1>Hello World!</h1>
    </body>
</html>
