<?php
	$sucesso ="";
	
	//se o método for POST, é pq ele submetou o formulário. Se for GET é para mostrar o formulário
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        $pergunta = $_POST["pergunta"];
        $pontos = $_POST["pontos"];
		$dificuldade = $_POST["dificuldade"];
		
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
	 $comandoSQL = "INSERT INTO `perguntas`(`pergunta`, `pontos`, `grauDificuldade`) VALUES ('$pergunta','$pontos','$dificuldade')"; //comandoSQL será responsável por guardar a chamada que insere os dados vindo do formulário no banco
	 $result = $conn->query($comandoSQL); //Faça uma conexão através da conexão com o mysql, utilizando o metodo query que executa comandos. Result guardará o resultado do comandoSQL
	
	$sucesso = "Pergunta inserida com sucesso!";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Criar Pergunta</h1>
<br>
<a href="Ex15_criarPerguntaBanco.php">Criar Pergunta</a><br><br><br>
<a href="Ex15_alterarUmaPerguntaBanco.php">Alterar Pergunta</a><br><br><br>
<a href="Ex15_listarPerguntasBanco.php">Listar Perguntas</a><br><br><br>
<a href="Ex15_listarPerguntaDoisBanco.php">Listar Pergunta</a><br><br><br>
<a href="Ex15_excluirUmaPerguntaBanco.php">Excluir Pergunta</a><br><br><br>
<br>
<h3><?php echo $sucesso; ?></h3>
<form action="Ex15_criarPerguntaBanco.php" method=POST>
	Pergunta: <input type=text name="pergunta"> <br>
	Pontos '1-100': <input type=text name="pontos"> <br>
	Dificuldade: <input type=text name="dificuldade"> <br>
	<br><br>
	<input type="submit" value="Criar Pergunta">
</form>
</body>
</html>