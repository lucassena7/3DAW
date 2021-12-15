<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Alterar Pergunta</h1>
<br>
<a href="Ex15_criarPerguntaBanco.php">Criar Pergunta</a><br><br><br>
<a href="Ex15_alterarUmaPerguntaBanco.php">Alterar Pergunta</a><br><br><br>
<a href="Ex15_listarPerguntasBanco.php">Listar Perguntas</a><br><br><br>
<a href="Ex15_listarPerguntaDoisBanco.php">Listar Pergunta</a><br><br><br>
<a href="Ex15_excluirUmaPerguntaBanco.php">Excluir Pergunta</a><br><br><br>
<br>

<?php
$sucesso = "";
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

	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$id = $_GET["id"];
		
		$comandoSQL = "SELECT * FROM `perguntas` where id='$id' "; //busque todos as colunas de alunos onde a matricula seja igual a matricula que veio por GET 	 
	    //Como a matricula é unica, só buscará os dados de um aluno.
		 
		$result = $conn->query($comandoSQL); //Faça uma conexão através da conexão com o mysql, utilizando o metodo query que executa comandos. Result guardará o resultado do comandoSQL
		$linha = $result->fetch_assoc(); //linha vai guardar os dados DO alunO
?>

<form action="Ex15_alterarPerguntaBanco.php" method=POST>
	Pergunta: <input type=text name="pergunta" value="<?php echo $linha['pergunta']?>"> <br>
	Pontos '1-100': <input type=text name="pontos" value="<?php echo $linha['pontos']?>"> <br>
	Dificuldade: <input type=text name="dificuldade" value="<?php echo $linha['grauDificuldade']?>"> <br>
	<input type="hidden" name="id" value="<?php echo $linha['id'] ?>">
	<br><br>
	<input type="submit" value="Alterar Pergunta">
</form>

<?php
}
elseif($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = $_POST["id"];
	$pergunta = $_POST["pergunta"];
    $pontos = $_POST["pontos"];
	$dificuldade = $_POST["dificuldade"];
	
	$comandoSQL = "UPDATE `perguntas` SET `pergunta`='$pergunta',`pontos`='$pontos',`grauDificuldade`='$dificuldade' WHERE id = $id";
	$resultado = $conn->query($comandoSQL);
	$sucesso = "Pergunta alterada com sucesso";
}
?>

<h3><?php echo $sucesso; ?></h3>
</body>
</html>