<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
	
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
	 $comandoSQL = "UPDATE `alunos` SET `nome`='$nome', `email`='$email', `cpf`='$cpf' WHERE matricula='$matricula' "; //o nome,email e cpf que vieram na requisição irão substituir os atributos que estão no banco. A matricula determinará quem eu vou alterar 	 
	 //Como a matricula é unica, só buscará os dados de um aluno.
	 
	 $result = $conn->query($comandoSQL); //Faça uma conexão através da conexão com o mysql, utilizando o metodo query que executa comandos. Result guardará o resultado do comandoSQL
}
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

<?php echo "Aluno $matricula alterado com sucesso!."; ?>

</body>
</html>