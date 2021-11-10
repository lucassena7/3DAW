<?php
	$matricula = "";
	$linhas = array();
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$matricula = $_GET["matricula"]; //variável que vem do formulário de alterarAluno, no caso a matricula
	}
	//$matricula = $_POST["matricula"];
	$arquivoAluno = fopen("alunoNovo.txt","r") or die ("Erro na abertura do arquivo");
	$cabecalho = fgets($arquivoAluno);
	$x = 0;
	$colunaDados = array(); //declarar um array de colunas
	$achei = false; //nao esquecer de declarar como falso, para caso eu encontre, retornar V
	while (!feof($arquivoAluno)) //enquanto NAO ! for final do arquivo, eu continuo lendo
		{
			$linhas[] = fgets($arquivoAluno); //Vou abrir o arquivo e pegar o conteudo dele linha por linha
			//echo $linhas[$x];
			//echo "<br>";
            $colunaDados = explode(";", $linhas[$x]); //coloco os dados de linhas separados por ; dentro do array colunaDados
			//echo "matricula arquivo: $colunaDados[1] / matricula aluno:  $matricula<br>";
			if ($colunaDados[1] == $matricula) //posicao 1 pois a 0 é onde está armezenado o nome
			{
				//echo "<br>ACHEI";
				$achei = true; //se eu achei a variavel na colunaDados, eu retorno V e paro de procurar
				break;//colunaDados contem a variavel que eu quero
			}
			$x++;
		}
		if (!$achei)
		{
			echo "matricula: $matricula não encontrada";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Buscar Aluno</h1>
<br>
<a href="Ex13_inserirAlunoDinamicoDois.php">Inserir Aluno</a><br>
<a href="Ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="refazendoEx13_listarAlunos.php">Listar Alunos</a><br>
<a href="Ex13_excluirAluno.php">Excluir Aluno</a><br>
<a href="refazendoEx13_detalheAluno.php">Detalhe Aluno</a><br>
<br>
<form action="Ex13_alterarAlunoNoMesmoArquivo.php" method=POST>
	Matricula: <input type=text name="matricula" value='<?php echo $colunaDados[1]; ?>'><br>
	Nome: <input type=text name="nome" value='<?php echo $colunaDados[0]; ?>' ><br>
	Email: <input type=text name="email" value='<?php echo $colunaDados[2]; ?>' ><br>
	Telefone: <input type=text name="telefone" value='<?php echo $colunaDados[3]; ?>' ><br>
	Data Nascimento: <input type=text name="dtNasc" value='<?php echo $colunaDados[4]; ?>' ><br>
	Cpf: <input type=text name="cpf" value='<?php echo $colunaDados[5]; ?>' ><br>
	Endereço: <input type=text name="endereco" value='<?php echo $colunaDados[6]; ?>' ><br>
	Cidade: <input type=text name="cidade" value='<?php echo $colunaDados[7]; ?>' ><br>
	Estado: <input type=text name="estado" value='<?php echo $colunaDados[8]; ?>' ><br>
	Cep: <input type=text name="cep" value='<?php echo $colunaDados[9]; ?>' ><br>
	<br><br>
	<input type="submit" value="Alterar">
</form>
</body>
</html>