<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW</h1>
<?php
$x = $_GET["var1"];
$y = $_GET["var2"];

if ( $x == $y) {
    echo "<p>x é igual a y, x = $x</p>";
} else {
    echo "<p>x é diferente '!=' de y, x = $x e y = $y</p>";
}
echo "<br><br>";
if ( $x === $y) {
    echo "<p>x é idêntico a y, x = $x</p>";
} else {
    echo "<p>x não é idêntico '!==' a y, x = $x e y = $y</p>";
}
echo "<br><br>";
if ( $x > $y) {
    echo "<p>x é maior que y, x = $x > y = $y</p>";
} elseif ( $x == $y) {
    echo "<p>x é igual '=' a y, x = $x</p>";
} else {
	echo "<p> x é menor '<' que y, x = $x < y = $y</p>";
}
echo "<br><br>";
?>
<br>
<form action="completarEx10_2.php" method=GET>
    <h3>Valores</h3>
    <input type=number name="var1"> e
    <input type=number name="var2"> =
    <br><br>
    <input type="submit" value="Comparar">
</form>
<br>
</body>
</html>