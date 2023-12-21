<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="app/view/css/style.css"> -->
    <link rel="stylesheet" href="<?= Ruta::CSS_PATH ?>style.css">
    <title>Cine</title>
</head>

<body>
    <?php
    if ($datos) {
    ?>
        <table>
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>NIF</th>
                    <th>Rol</th>
                    <th>Avatar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $usuario) { ?>
                    <tr>
                        <td><?= $usuario['correo']; ?></td>
                        <td><?= $usuario['nombre']; ?></td>
                        <td><?= $usuario['apellidos']; ?></td>
                        <td><?= $usuario['NIF']; ?></td>
                        <td><?= $usuario['rol']; ?></td>
                        <td><img src="<?= Ruta::AVATAR_PATH . $usuario['avatar']; ?>" alt="Avatar"></td>
                        <!-- <td><img src="<?= 'app/view/img/avatar/' . $usuario['avatar']; ?>" alt="Avatar"></td> -->
                    </tr>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "No se encontraron usuarios.";
    }
    ?>
</body>

</html>