<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        $nome = $_POST["nome"];
        $matricula = $_POST["matricula"];
		$email = $_POST["email"];
		$fone = $_POST["telefone"];
        $dtNasc = $_POST["dtNasc"];
        $cpf = $_POST["cpf"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
		
		//Escrever os dados do formulário em um arquivo de dados txt
		if (!file_exists("alunoNovo.txt")) //se o alunoNovo NAO existir
		{
			$txt = "nome;matricula;email;telefone;data Nascimento;cpf;endereco;cidade;estado;cep\n"; //atribuindo a primeira linha aos dados que há no arquivo, Nao esquecer do n para quebrar  linha
			file_put_contents("alunoNovo.txt", $txt); //Se o arquivo não existir, ele cria e manda gravar o que esta no txt 
		}
		$txt = $nome . ";" . $matricula . ";" . $email . ";" . $fone . ";" . $dtNasc . ";" . $cpf . ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep . "\n";// colocando as variáveis dentro de txt
		file_put_contents("alunoNovo.txt", $txt, FILE_APPEND); 
	}
	//Esse formato serve para verificar se o arquivo existe, se existir ele escreve no final. Se nao existir, ele escreve o cabeçalho e escreve o restante no final
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Inserir Aluno</h1>
<br>
<a href="Ex13_inserirAlunoDinamicoDois.php">Inserir Aluno</a><br>
<a href="Ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="refazendoEx13_listarAlunos.php">Listar Alunos</a><br>
<a href="Ex13_excluirAluno.php">Excluir Aluno</a><br>
<a href="refazendoEx13_detalheAluno.php">Detalhe Aluno</a><br>
<br>
<form action="Ex13_inserirAlunoDinamicoDois.php" method=POST>
	Matricula: <input type=text name="matricula"> <br>
	Nome: <input type=text name="nome"> <br>
	Email: <input type=text name="email"> <br>
	Telefone: <input type=text name="telefone"> <br>
	Data Nascimento: <input type=text name="dtNasc"> <br>
	Cpf: <input type=text name="cpf"> <br>
	Endereço: <input type=text name="endereco"> <br>
	Cidade: <input type=text name="cidade"> <br>
	Estado: <input type=text name="estado"> <br>
	Cep: <input type=text name="cep"> <br>
	<br><br>
	<input type="submit" value="Inserir">
</form>
</body>
</html>