<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Subir Archivo</title>
</head>
<body>
    <h1>Subir Archivo</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $target_dir = "archivos/";  // Directorio donde se guardarán los archivos subidos
        $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
        
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            echo '<div class="message">El archivo ' . htmlspecialchars(basename($_FILES["archivo"]["name"])) . ' ha sido subido con éxito.</div>';
        } else {
            echo '<div class="message">Hubo un error al subir el archivo.</div>';
        }
    }
    ?>

    <form action="subir.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" value="Subir Archivo">
    </form>
</body>
</html>