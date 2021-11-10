<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW</h1>
<?php 
	function somar($soma)
	{
		$x = $_POST['var1'];
		$y = $_POST['var2'];
		echo $soma = $x + $y;
	}
	
	function subtrair($subtrai)
	{
		$x = $_POST['var1'];
		$y = $_POST['var2'];
		echo $subtrai = $x - $y;
	}
	function multiplicar($multiplica)
	{
		$x = $_POST['var1'];
		$y = $_POST['var2'];
		echo $multiplica = $x * $y;
	}
	
	function dividir($divide)
	{
		$x = $_POST['var1'];
		$y = $_POST['var2'];
		echo $divide = $x / $y;
	}
		
	function exponenciacao($exp)
	{
		$x = $_POST['var1'];
		$y = $_POST['var2'];
		echo $exp = $x ** $y;
	}
	function raiz($raiz)
	{
		$z = $_POST['var3'];
		echo $raiz = (sqrt($z));	
	}
?>
<br>
<form action="Calculadora.php" method=POST>
    <h3>Calculadora</h3>
    a: <input type=number name="var1">
    b: <input type=number name="var2">
	<br><br>
	Raiz Quadrada <input type=number name="var3">
	<br><br><br><br>
	<select name="operacoes">
		<option value="+">Soma</option>
		<option value="-">Subtração</option>
		<option value="*">Multiplicação</option>
		<option value="/">Divisão</option>
		<option value="**">Exponeciação</option>
		<option value="sqrt">Raiz Quadrada</option>
		<input type="submit" value="Calcular"> Resultado:
	</select>
	<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$operacoes = $_POST["operacoes"];
		
		if($operacoes == '+')
		{
		$soma = "";	
		somar($soma);
		}
		if($operacoes == '-')
		{
		$subtrai = "";	
		subtrair($subtrai);
		}
		if($operacoes == '*')
		{
		$multiplica = "";	
		multiplicar($multiplica);
		}
		if($operacoes == '/')
		{
		$divide = "";	
		dividir($divide);
		}
		if($operacoes == '**')
		{
		$exp = "";	
		exponenciacao($exp);
		}
		if($operacoes == 'sqrt')
		{
		$raiz = "";	
		raiz($raiz);
		}
		
	}	
	?>	
    
</form>
<br>
	<h4> Nota 1: Para realizar as operações de 'Soma, Subtração, Multiplicação, Divisão ou Exponeciação' digite os valores de 'a' e de 'b', em seguida, selecione a operação e clique em 'calcular'. </h4>
	<h4> Nota 2: Para calcular a raiz quadrada de um número, digite um valor no campo 'Raiz Quadrada', em seguida, selecione a operação 'Raiz Quadrada' e clique em 'calcular'. </h4>
</body>
</html>