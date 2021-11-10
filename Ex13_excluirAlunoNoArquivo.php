<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") 
    {
        $matricula = $_GET["matricula"];
        
        if (!file_exists("alunoNovo.txt"))
        {
            echo("<h2>O arquivo não existe</h2>");
            die;
        }
        $linhas = array();
        $arquivoAluno = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");
        $cabecalho =  fgets($arquivoAluno); 
        //$x=0;
        $sucesso=0;
        $linha = array();
        while (!feof($arquivoAluno)) 
        {	
           $linhas[] = fgets($arquivoAluno);  
           $linha = explode(";", $linhas);
           
           if ($linha[1] == $matricula)
           {
               $nome = $linha[0];
               $dtNasc = $linha[2];
               $email = $linha[3];
               $cpf = $linha[4];
               $telefone = $linha[5];
               $endereco = $linha[6];
               $cidade = $linha[7];
               $estado = $linha[8];
               $cep = $linha[9];
               $sucesso = 1;
               break;
           }
           $x++;
        }
        fclose($arquivoAluno);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $matricula = $_POST["matricula"];
       
        if (file_exists("alunoNovo.txt"))
        {
            $linhas = array();
            $arquivoAluno = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");
            $x=0;  
            
            while (!feof($arquivoAluno))
            {
                $linhas[$x] = fgets($arquivoAluno);
                $linha = explode(";", $linhas[$x]);
                if ($linha[1] == $matricula)
                {
                    $posicao = $x;
                }
                $x++;
            } 
            fclose($arquivoAluno);
            
            $i=0;
            $arquivoAluno = fopen("alunoNovo.txt", "w") or die("Erro na abertura do arquivo");
            $linha = array();

            for ($i; $i<=$x; $i++)
            {
                if ($i == $posicao)
                {
                   $i++;
                }

                fwrite($arquivoAluno,$linhas[$i]);
            }
            fclose($arquivoAluno);

            echo "<script>window.location='Ex13_buscarAlunoNoArquivo.php'; alert('Aluno $nome excluido com Sucesso!'); </script>";
        }
    }
   
    
?>

<!DOCTYPE html>
<html>
<head>
    <body>
     <br>
		<a href="Ex13_inserirAlunoDinamicoDois.php">Inserir Aluno</a><br>
		<a href="Ex13_alterarAluno.php">Alterar Aluno</a><br>
		<a href="refazendoEx13_listarAlunos.php">Listar Alunos</a><br>
		<a href="Ex13_excluirAluno.php">Excluir Aluno</a><br>
		<a href="refazendoEx13_detalheAluno.php">Detalhe Aluno</a><br>
		<br>

        <h1>Excluir Aluno</h1>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            if ($sucesso == 0)
            {
                echo "<script>alert ('Matrícula não encontrada')</script>";
                echo "<h3>Matrícula não encontrada<h3>";
                die;
            }
            echo("<h3>Matricula: $matricula</h3>");
        }
        ?>
		   <form action="Ex13_excluirAlunoNoArquivo.php" method=POST>
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
                
        <br>
    </body>
</html>
