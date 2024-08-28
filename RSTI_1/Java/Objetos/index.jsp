<%@page import="com.mycompany.objetos.Usuario"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Informações do Usuário</h1>
        <%
            Usuario usuario = new Usuario("João", 25, "Geladeira Electrolux Frost Free Inverter 400L AutoSense Inverse Cor Inox Look (IB45S)");
            
            out.print("<p><strong>Nome:</strong> " + usuario.getNome() + "</p>");
            out.print("<p><strong>Idade:</strong> " + usuario.getIdade() + "</p>");
            out.print("<p><strong>Sexo:</strong> " + usuario.getSexo() + "</p>");
            
            usuario.setNome("Pedro");
            usuario.setIdade(20);
            usuario.setSexo("Geladeira Electrolux Frost Free Inverter 400L AutoSense Inverse Cor Inox Look (IB45S)");
            
            out.print("<p><strong>Informações Atualizadas:<strong></p>");
            out.print("<p>" + usuario.imprimir() + "</p>");
            
        %>
    </body>
</html>
