<?php
/*
 Realizar una funcion que reciba un numero entero "id" de un pokemon y devuelva su nombre. 
 Para esto la funcion debe consultar una api de pokemon enviarle el id y obtener el campo "nombre" el cual va a retornar. 
 URL = https://pokeapi.co/api/v2/pokemon-form/{id}.
*/

    // Método para consultar (vía cURL) el pokemon requerido
    function buscarPokemon($id) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon-form/" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $response = curl_error($curl);
        }
        return $response;
    }

    if (isset($_POST["id"])) {
        $respuesta = json_decode(buscarPokemon($_POST["id"]));
        if (is_null($respuesta)) {
            $nombre = "No existe";
        } else {
            $nombre = $respuesta->name;
        }
    } else {
        $nombre = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <form action="" method="post">
        <label>ID del pokemon: </label>
        <input type="text" name="id">
        <button type="submit">Enviar</button>
    </form>
    <label>
        Nombres del pokemon: <?php print_r($nombre . "<br />"); ?>
    </label>
</body>
</html>