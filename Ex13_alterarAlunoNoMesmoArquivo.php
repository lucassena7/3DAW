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

    $arquivoAlunoIn = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");
    while (!feof($arquivoAlunoIn)) 
	{
        $linhas[] = fgets($arquivoAlunoIn);
    }
    fclose($arquivoAlunoIn);

    $arquivoAlunoOut = fopen("alunoNovo.txt", "w") or die("Erro na abertura do arquivo");
    //$x = 0;
    //$linha = "";
    foreach ($linhas as $linha) 
	{
        $colunaDados = explode(";", $linha);
        if ($colunaDados[1] == $matricula) 
		{
            $txt = "$nome;$matricula;$dtNasc;$email;$cpf;$fone;$endereco;$cidade;$estado;$cep\n";
        } 
		else 
		{
            $txt = $linha;
        }
        fwrite($arquivoAlunoOut, $txt);
    }
    fclose($arquivoAlunoOut);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Alterar Aluno Mesmo Arquivo</h1>
<br>
<a href="Ex13_inserirAlunoDinamicoDois.php">Inserir Aluno</a><br>
<a href="Ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="refazendoEx13_listarAlunos.php">Listar Alunos</a><br>
<a href="refazendoEx13_excluirAluno.php">Excluir Aluno</a><br>
<a href="refazendoEx13_detalheAluno.php">Detalhe Aluno</a><br>
<br>
<form action="Ex13_buscarAlunoNoArquivo.php" method=POST>
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