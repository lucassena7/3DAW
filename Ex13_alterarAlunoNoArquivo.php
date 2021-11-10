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
		
		$arquivoAlunoIn = fopen("alunoNovo.txt","r") or die ("Erro na abertura do arquivo");
		$arquivoAlunoOut = fopen("alunoAlterado.txt","w") or die ("Erro na abertura do arquivo");
		$x = 0;
		$linhas = array();
		while (!feof($arquivoAlunoIn)) //enquanto NAO ! for final do arquivo, eu continuo lendo
		{
			$linhas[] = fgets($arquivoAlunoIn); //Vou abrir o arquivo e pegar o conteudo dele linha por linha
			$colunaDados = explode(";", $linhas[$x]);
			
			if ($colunaDados[1] == $matricula) //posicao 1 pois a 0 é onde está armezenado o nome
			{
				$txt = $nome . ";" . $matricula . ";" . $email . ";" . $fone . ";" . $dtNasc . ";" . $cpf . ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep . "\n";//se a matricula informada for igual a qqlr matricula ja armazenada, ele escreve os dados que chegaram no arquivo novo
			}
			else
			{
				$txt = $linhas[$x]; //se nao for, ele escreve os conteúdos ja existentes no arquivo
			}
			fwrite($arquivoAlunoOut, $txt); //vou escrever o conteúdo de txt no arquivoAluno de saida
			$x++; //escrever tomas as linhas
		}
		fclose($arquivoAlunoOut);//fechando o arquivo
		fclose($arquivoAlunoIn);//fechando o arquivo
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Alterar Aluno</h1>
<br>
<a href="Ex13_inserirAlunoDinamicoDois.php">Inserir Aluno</a><br>
<a href="Ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="refazendoEx13_listarAlunos.php">Listar Alunos</a><br>
<a href="Ex13_excluirAluno.php">Excluir Aluno</a><br>
<a href="refazendoEx13_detalheAluno.php">Detalhe Aluno</a><br>
<br>
<form action="Ex13_alterarAlunoNoMesmoArquivo.php" method=POST>
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
	<input type="submit" value="Alterar">
</form>
</body>
</html>