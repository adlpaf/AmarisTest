<?php
/*
 Se dice que dos cadenas X y Y son amigas si existen dos cadenas no vacías u y v tales que X = uv e Y = vu. 
 Por ejemplo, "tokyo" y "kyoto" son amigas, siendo u = “to” y v = “kyo”. 
 Escriba una funcion que reciba como entrada dos cadenas X e Y, e imprima si X e Y son amigas.

 TOKYO
 OTOKY
 YOTOK
 YOKOT
*/

    if (isset($_POST["texto1"]) && isset($_POST["texto2"])) {
        // Se inicializa la variable que se mostrará como resultado
        $amigas = "No son amigas";
        // Se obtienen los textos ingresados
        $texto1 = trim($_POST["texto1"]);
        $texto2 = trim($_POST["texto2"]);
        // Se cuentan los caracteres del primer texto introducido para hacer las divisiones de la palabra
        $cantidadCaracteres = strlen($texto1);
        // Ciclo para dividir el Texto primero 
        for ($i = 1; $i <= $cantidadCaracteres; $i++) {
            // Se extraen las subcadenas para hacer las comparaciones de las dos subcadenas con el Texto segundo
            $u = substr($texto1, 0, $i);
            $v = substr($texto1, $i);
            $resultado = $v . $u;
            // En caso que haya una coincidencia se determinan que son Palabras amigas
            if (strtolower($resultado) == strtolower($texto2)) {
                $amigas = "Son amigas";
                break;
            }
        }
    } else {
        $amigas = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <form action="" method="post">
        <label>Palabra 1: </label>
        <input type="text" name="texto1"><br />
        <label>Palabra 2: </label>
        <input type="text" name="texto2">
        <button type="submit">Enviar</button>
    </form>
    <label>
        <?php echo $amigas; ?>
    </label>
</body>
</html>