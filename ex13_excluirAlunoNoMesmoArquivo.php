<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $arquivoAlunoIn = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");
    while (!feof($arquivoAlunoIn)) {
        $linhas[] = fgets($arquivoAlunoIn);
    }
    fclose($arquivoAlunoIn);

    $arquivoAlunoOut = fopen("alunoNovo.txt", "w") or die("Erro na abertura do arquivo");
    $x = 0;
    //$linha = "";
    foreach ($linhas as $linha) {
        $colunaDados = explode(";", $linha);
        if ($colunaDados[1] != $matricula) 
		{
            $txt = $linha;
            fwrite($arquivoAlunoOut, $txt);
        }
    }
    fclose($arquivoAlunoOut);
}
?>
<!DOCTYPE html>
    <html>
        <head>
        </head>
        <body>
            <h1>Excluir Aluno</h1>
            <br>
            <br>
            <form action="ex13_buscarAlunoNoArquivo.php" method=POST>
                Matricula: <input type=text name="matricula" >
                <br><br>
                <input type="submit" value="Procurar">
            </form>
            <br>
        </body>
    </html>