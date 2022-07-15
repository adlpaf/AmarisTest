<?php
/*
 Realizar una funcion que reciba una cadena de texto, que contenga una lista de nombres separados por comas 
 ejemplo "Luis,Camilo,Andres,Laura" y devuelva dos parametros: una array de strings con los nombres ordenados 
 alfabeticamente y un entero indicando la cantidad de nombres.
*/

    if (isset($_POST["texto"])) {
        $nombres = explode(",", $_POST["texto"]);
        sort($nombres, SORT_STRING);
        $cantidad = count($nombres);
    } else {
        $nombres = array();
        $cantidad = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="" method="post">
        <label>Nombres separados por coma (,): </label>
        <input type="text" name="texto">
        <button type="submit">Enviar</button>
    </form>
    <label>
        Nombres: <br />
        <?php
            foreach ($nombres as $nombre) {
                echo trim($nombre) . "<br />";
            }
        ?>
    </label>
    <label>
        Cantidad de nombres: <?php echo $cantidad; ?>
    </label>
</body>
</html>