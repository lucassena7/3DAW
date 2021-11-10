<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $matricula = $_POST["matricula"];
        $dtNasc = $_POST["dtNasc"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $fone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
//  Vou escrever os dados do formulário em um arquivo de dados
	//	$txt = "nome;matricula;data Nascimento;email;cpf;telefone;endereco;cidade;estado;cep\n";
        $txt = $nome . ";" . $matricula . ";" . $dtNasc . ";" . $email . ";" . $cpf . ";" . $fone;
        $txt = $txt . ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep . "\n";
		file_put_contents("alunosNovos.txt", $txt, FILE_APPEND);
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Inserir Aluno</h1>
<br>
<a href="Ex13_inserirAluno.php">Inserir Aluno</a><br>
<a href="Ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="Ex13_listarAlunos.php">Listar Alunos</a><br>
<a href="Ex13_excluirAluno.php">Excluir Aluno</a><br>
<a href="Ex13_detalheAluno.php">Detalhe de Aluno</a><br>
<br>
<form action="Ex13_inserirAluno.php" method=POST>
    Matricula: <input type=text name="matricula"> <br>
    Nome: <input type=text name="nome"> <br>
    Email: <input type=text name="email"> <br>
    Data Nascimento: <input type=text name="dtNasc"> <br>
    Cpf: <input type=text name="cpf"> <br>
    Telefone:<input type=text name="telefone"> <br>
    Endereço: <input type=text name="endereco"> <br>
    Cidade: <input type=text name="cidade"> <br>
    Estado: <input type=text name="estado"> <br>
    Cep: <input type=text name="cep"> <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>