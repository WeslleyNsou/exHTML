<?php
     include('header.php'); 

    $data_nascimento = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");
?>