<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Cadastro de Usuários</h1>
        <form action="cad.jsp">
            <label for="nome" id="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Nome Completo">
            <br>
            <label for="email" id="email">E-mail</label>
            <input type="text" id="email" name="email" placeholder="Email">
            <br>
            <label for="dataN" id="dataN">Data de Nascimento</label>
            <input type="text" id="dataN" name="dataN" placeholder="Data de Nasc.">
            <br>
            <label for="genero" id="genero">Gênero</label>
            <select name="genero">
                <option id="homem">Homem</option>
                <option id="mulher">Mulher</option>
                <option id="heli">Helicóptero de Combate Boeing AH-64 Apache</option>
                <option id="heli2">Helicóptero de Combate Kamov Ka-50/Ka-52</option>
                <option id="gela">Geladeira Electrolux Frost Free Inverter 400L AutoSense Inverse Cor Inox Look (IB45S)</option>
                <option id="tv">Smart TV LG QNED AI 4K QNED85 50 polegadas 2024</option>
                <option id="carro">BMW Individual M760Li xDrive Model V12 Excellence THE NEXT 100 YEARS</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
