<?php

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include('header.php'); ?>
    </head>
<body>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" id="dataNascimento" name="dataNascimento" required>
        <button type="submit">Verificar Signo</button>
    </form>
</body>
</html>

?>