
    <?php include('layouts/header.php'); ?>
<body>

    <H1>Descubra seu Signo:</H1>
    <form action="show_zodiac_sign.php" method="POST">
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" id="dataNascimento" name="dataNascimento" required>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>