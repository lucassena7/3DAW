<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Listar Tabela de Alunos</h1>
<br>
<a href="exercicio14_inserirAlunoBanco.php">Inserir Aluno</a><br>
<a href="exercicio14_alterarAlunoBanco.php">Alterar Aluno</a><br>
<a href="exercicio14_listarTabelaAlunos.php">Listar Alunos</a><br>
<a href="exercicio14_excluirAlunoBanco.php">Excluir Aluno</a><br>
<a href="exercicio14_detalheAlunoBanco.php">Detalhe de Aluno</a><br>
<br><br>

<table border="1">
    <tr>
        <th>Matricula</th>
        <th>Nome</th>
        <th>Email</th>
        <th>CPF</th>
        <th>Ações</th>
    </tr>

<?php
 //estabelecendo a conexão
 //criando um conjunto de variáveis 
 $servidor = "localhost"; //indicando onde está o banco
 $usuario = "root"; //definindo quem vai acessar o banco
 $senha = ""; // indicando que o banco nao tem senha
 $nomeBanco = "faeterj3daw"; //indicando o nome do banco
 
 //criando a conexão
 $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
 if ($conn -> connect_error) //se a conexão der erro
 {
	 die ("conexão com erro: " .$conn->connect_error); //vai aparecer uma mensagem de erro dizendo qual foi este erro
	 
 }
 $comandoSQL = "SELECT * FROM `alunos`"; //comandoSQL será responsável por guardar a chamada que exibe todos do banco
 $result = $conn->query($comandoSQL); //Faça uma conexão através da conexão com o mysql, utilizando o metodo query que executa comandos. Result guardará o resultado do comandoSQL

 while ($linha = $result->fetch_assoc()) //linha vai receber de result um array 'fetch_assoc'. O fetch_assoc retorna linha por linha e coloca em um array
 {
	 echo "<tr>";
	 echo "<td>". $linha["matricula"] . "</td>"; //mesmo nome do atributo do banco
	 echo "<td>". $linha["nome"] . "</td>";
	 echo "<td>". $linha["email"] . "</td>";
	 echo "<td>". $linha["cpf"] . "</td>";
	 echo "<td><a href='exercicio14_buscarAlunoBanco.php?matricula= ". $linha["matricula"] . "'>Alterar</a></td>";
	 echo "</tr>";
 }
?>
</table>
</body>
</html>