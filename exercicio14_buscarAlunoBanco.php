<?php
$matricula = "";
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$matricula = $_GET["matricula"];
	}
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
	 $comandoSQL = "SELECT * FROM `alunos` where matricula='$matricula' "; //busque todos as colunas de alunos onde a matricula seja igual a matricula que veio por GET 	 
	 //Como a matricula é unica, só buscará os dados de um aluno.
	 
	 $result = $conn->query($comandoSQL); //Faça uma conexão através da conexão com o mysql, utilizando o metodo query que executa comandos. Result guardará o resultado do comandoSQL
	 $linha = $result->fetch_assoc(); //linha vai guardar os dados DO alunO
	 
	 //echo $linha["matricula"]; //mesmo nome do atributo do banco
	 //echo "<br>";
	 //echo $linha["nome"];
	 //echo "<br>";
	 //echo $linha["email"];
	 //echo "<br>";
	 //echo $linha["cpf"];
	 //echo "<br>";
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Aluno</h1>
<br>
<a href="exercicio14_inserirAlunoBanco.php">Inserir Aluno</a><br>
<a href="exercicio14_alterarAlunoBanco.php">Alterar Aluno</a><br>
<a href="exercicio14_listarTabelaAlunos.php">Listar Alunos</a><br>
<a href="exercicio14_excluirAlunoBanco.php">Excluir Aluno</a><br>
<a href="exercicio14_detalheAlunoBanco.php">Detalhe de Aluno</a><br>
<br>
<form action="exercicio14_alterarAlunoBanco.php" method=POST>
    Matricula: <input type=text name="matricula" value='<?php echo $linha["matricula"] ?>'> <br>
    Nome: <input type=text name="nome" value='<?php echo $linha["nome"] ?>'> <br>
    Email: <input type=text name="email" value='<?php echo $linha["email"] ?>'> <br>
    Cpf: <input type=text name="cpf" value='<?php echo $linha["cpf"] ?>'> <br>
    <br><br>
    <input type="submit" value="Alterar">
</form>
<br>
</body>
</html>