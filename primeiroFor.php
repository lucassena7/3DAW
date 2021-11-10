<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW Manhã</h1>
<?php
$nomes = array("Lucas", "Miguel", "de", "Sena", "Costa");

$emails = array("Lucas@faeterj-rio.edu.br", "Miguel@faeterj-rio.edu.br",
    "de@faeterj-rio.edu.br", "Sena@faeterj-rio.edu.br", "Costa@faeterj-rio.edu.br");

$idades = array(1,2,3,4,5);

$medias = array(7.1,7.2,7.3,7.4,7.5);
?>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Media</th>
    </tr>
    <?php
        for ($x=0; $x <= 4; $x++) {
            echo "<tr>";
            echo "<td>$nomes[$x]</td>";
            echo "<td>$emails[$x]</td>";
            echo "<td>$idades[$x]</td>";
            echo "<td>$medias[$x]</td>";
            echo "</tr>";
    }
        ?>
</table>
<br>
</body>
</html>