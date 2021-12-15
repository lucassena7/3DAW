<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>Listar Perguntas</h1>
<br>
<a href="Ex15_criarPerguntaBanco.php">Criar Pergunta</a><br><br><br>
<a href="Ex15_alterarUmaPerguntaBanco.php">Alterar Pergunta</a><br><br><br>
<a href="Ex15_listarPerguntasBanco.php">Listar Perguntas</a><br><br><br>
<a href="Ex15_listarPerguntaDoisBanco.php">Listar Pergunta</a><br><br><br>
<a href="Ex15_excluirUmaPerguntaBanco.php">Excluir Pergunta</a><br><br><br>
<br><br>

<table border="1">
    <tr>
        <th>Pergunta</th>
        <th>Pontos</th>
        <th>GrauDificuldade</th>
		<th>Ações</th>
    </tr>

<?php
 //estabelecendo a conexão
 //criando um conjunto de variáveis 
 $servidor = "localhost"; //indicando onde está o banco
 $usuario = "root"; //definindo quem vai acessar o banco
 $senha = ""; // indicando que o banco nao tem senha
 $nomeBanco = "faeterj3dawgame"; //indicando o nome do banco
 
 //criando a conexão
 $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
 if ($conn -> connect_error) //se a conexão der erro
 {
	 die ("conexão com erro: " .$conn->connect_error); //vai aparecer uma mensagem de erro dizendo qual foi este erro
	 
 }
 $comandoSQL = "SELECT * FROM `perguntas`"; //comandoSQL será responsável por guardar a chamada que exibe todos do banco
 $result = $conn->query($comandoSQL); //Faça uma conexão através da conexão com o mysql, utilizando o metodo query que executa comandos. Result guardará o resultado do comandoSQL

 while ($linha = $result->fetch_assoc()) //linha vai receber de result um array 'fetch_assoc'. O fetch_assoc retorna linha por linha e coloca em um array. Quando não tiver mais linha ele sai do while
 {
	 echo "<tr>";
	 echo "<td>". $linha["pergunta"] . "</td>"; //mesmo nome do atributo do banco
	 echo "<td>". $linha["pontos"] . "</td>";
	 echo "<td>". $linha["grauDificuldade"] . "</td>";
	 echo "<td><a href='Ex15_alterarPerguntaBanco.php?id=" . $linha["id"] . "'>Alterar</a>";
	 echo "<td><a href='Ex15_excluirPerguntaBanco.php?id=" . $linha["id"] . "'>Excluir</a>";
	 echo "</tr>";
 }
?>
</table>
</body>
</html>