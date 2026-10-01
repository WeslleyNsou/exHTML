<!DOCTYPE html>
<html lang="en">
    <?php include('layouts/header.php'); ?>
<body>
    <form action="show_zodiac_sign.php" method="POST">
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" id="dataNascimento" name="dataNascimento" required>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>