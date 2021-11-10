<?php
		//Escrever os dados do formulário em um arquivo de dados txt
		$linhas = array();//criando um array das linhas para os dados de cada aluno
		$colunas = array(); //criando um array colunas para preencher a primeira linha das colunas
		$arquivoAluno = fopen("alunoNovo.txt","r") or die ("Erro na abertura do arquivo"); //arvuivoAluno é uma variável que aponta para o arquivo alunoNovo txt, o R significa read
		$cabecalho = fgets($arquivoAluno); //jogando a primeira linha do arquivo na variavel cabecalho
		$colunas = explode(";", $cabecalho); //criou um array de colunas a partir da quebra de linhas ; pela variavel cabecalho
		//$x = 0;
		while (!feof($arquivoAluno)) //enquanto NAO ! for final do arquivo, eu continuo lendo
		{
			$linhas[] = fgets($arquivoAluno); //Vou abrir o arquivo e pegar o conteudo dele linha por linha
			//echo $linhas[$x] . "<br>";
			//$x++;
		}
		fclose($arquivoAluno);//fechando o arquivo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Listar Alunos</h1>
<br>
<a href="Ex13_inserirAlunoDinamicoDois.php">Inserir Aluno</a><br>
<a href="Ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="refazendoEx13_listarAlunos.php">Listar Alunos</a><br>
<a href="Ex13_excluirAluno.php">Excluir Aluno</a><br>
<a href="refazendoEx13_detalheAluno.php">Detalhe Aluno</a><br>
<br><br>
<table border="1">
	<?php
    echo "<tr>";
		foreach ($colunas as $cabeca)
		{
			echo "<th>$cabeca</th>";
		}
			echo "<th>Ações</th>";
    echo "</tr>";
	
        foreach ($linhas as $linha) //pego cada linha da variavel linhaS e jogo em linhA
		{
            echo "<tr>";
            $colunas1 = array(); //declarar um array de colunas
            $colunas1 = explode(";", $linha); //coloco os dados de linhA separados por ; dentro do array colunas1
//            echo $linha . "<br>";
			$mat = $colunas1[1]; //atribuindo a variavel mat recebendo o primeiro dado de colunas1, que é a matrícula 
            foreach ($colunas1 as $coluna) //pego cada dado de colunas1 e jogo em coluna
			{
                echo "<td>$coluna</td>";
            }
			echo "<td><a href='Ex13_buscarAlunoNoArquivo.php?matricula=$mat'>Alterar</a></td>"; //metodo GET para buscar o aluno no formulário buscarAluno
            echo "</tr>";
        }
    ?>
</table>
</body>
</html>