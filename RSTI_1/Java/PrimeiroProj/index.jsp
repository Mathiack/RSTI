<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        <p>Sou uma página Java WEB</p>
        <%
            String nome = "Tutor";
            int idade = 30;
            out.print(nome);
            out.print("<br>Idade do Tutor ( taxa de erro entre 10 e 30 anos ): " + idade + "<br><br>");
        %>
        <a href="contarW.jsp">Contar até 10 com While</a>
        <br><br>        
        <a href="contarF.jsp">Contar até 10 com For</a>
        <br>
        <p>Vamo pro <a href="form.jsp">formulário</a></p>
        <p>Me dê um <a href="numero.jsp">número</a></p>
    </body>
</html>
