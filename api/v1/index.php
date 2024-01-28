<?php
include "ejemplos.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API CINE</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

<body>
    <div class="container">
        <h1>API Sala Cine</h1>
        <div class="divbody">
            <h2>URL API</h2>
            <code>
                <?= $ruta = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>
            </code>

            <div class="api-endpoint">
                <code><span class='v'>GET</span> /cine/peliculas</code>
                <p>JSON que contiene un array de objetos con los campos: id, nombre, carátula y elenco.
                    El elenco es a su vez un array de objetos que incluyen: id, nombre, rol e imagen del personal.</p>
                <details>
                    <summary>Ver ejemplo JSON</summary>
                    <pre class="json"><?= style_json($json1) ?></pre>
                </details>
            </div>

            <div class="api-endpoint">
                <code><span class='v'>GET</span> /cine/peliculas/$id</code>
                <p>Objeto JSON contiene la información de la película con id indicado</p>
                <details>
                    <summary>Ejemplo JSON</summary>
                    <pre class="json"><?= style_json($json2) ?></pre>
                </details>
            </div>
            <div class="api-endpoint">
                <code><span class='v'>GET</span> /cine/actores</code>
                <p> Array JSON que contiene objetos con los campos: id, nombre, imagen y películas.
                    El películas es a su vez un array de objetos con los campos: id y nombre de las películas asociadas al actor.</p>
                <details>
                    <summary>Ejemplo JSON</summary>
                    <pre class="json"><?= style_json($json3) ?></pre>
                </details>
            </div>
            <div class="api-endpoint">
                <code><span class='v'>GET</span>/cine/actores/$id</code>
                <p>Objeto JSON son la información del actor con id indicado.</p>
                <details>
                    <summary>Ejemplo JSON</summary>
                    <pre class="json"><?= style_json($json4) ?></pre>
                </details>
            </div>

            <div class="api-endpoint">
                <code><span class='v'>GET</span> /cine/sesiones</code>
                <p>Información de las sesiones programadas. Array JSON que contiene objetos con los campos: id, sala, pelicula, dia, hora, asientos_libres, asientos_ocupados</p>
                <details>
                    <summary>Ejemplo JSON</summary>
                    <pre class="json"><?= style_json($json5) ?></pre>
                </details>
            </div>

            <div class="api-endpoint">
                <code><span class='v'>GET</span> /cine/sesiones?dia=YYYY-MM-DD</code>
                <p>Objeto JSON son la información de la sesión indicada</p>
                <details>
                    <summary>Ejemplo JSON</summary>
                    <pre class="json"><?= style_json($json6) ?></pre>
                </details>
            </div>
            
            <div class="api-endpoint">
                <code><span class='n'>POST</span> /cine/peliculas</code>
                <p>Permite insertar una película, son obligatorios los campos: nombre, argumento, clasificacion_edad, genero y cartel. El cartel debe adjuntarse al JSON den formato base64</p>
                <details>
                    <summary>Ejemplo JSON</summary>
                    <pre class="json"><?= style_json($json7) ?></pre>
                </details>
            </div>
        </div>
    </div>
</body>

</html>