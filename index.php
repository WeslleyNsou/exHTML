
    <?php include('layouts/header.php'); ?>
<body>
    <div class="container mt-5">
        <div class="card mx-auto shadow-sm" style="max-width: 600px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Descubra seu Signo:</h1>
                <form id="signo-form" action="show_zodiac_sign.php" method="POST">
                    <div class="mb-3">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" id="dataNascimento" name="dataNascimento" required>
                    </div>
                    <input type="submit" value="Enviar" class="btn btn-primary w-100 ">
                </form>
            </div>
        </div>
    </div>
</body>
</html>