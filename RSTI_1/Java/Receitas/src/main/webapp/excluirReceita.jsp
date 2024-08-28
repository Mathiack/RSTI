<%@page import="com.mycompany.receitas.Receita"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Excluir Receitas</title>
    </head>
    <body>
        <h1>Excluir Receitas</h1>
        <%
            int id = Integer.parseInt(request.getParameter("id"));

            Receita receita = new Receita();
            receita.setId(id);

            boolean sucesso = receita.deletar();

            if (sucesso) {
                out.println("Receita excluida com sucesso!");
            } else {
                out.println("Erro ao excluir receita.");
            }
        %>
        <a href="listaReceitas.jsp">Voltar</a>
    </body>
</html>
