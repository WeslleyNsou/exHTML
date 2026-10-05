<?php
     include('layouts/header.php'); 
    
     //Recebe a data de nascimento do formulário
     $data_nascimento = $_POST['dataNascimento'];

     //Compara apenas mês e dia, sem depender do ano de nascimento
     $data_objeto = new DateTime($data_nascimento);
     $mes_dia_nascimento = $data_objeto->format('md');
     $signo_encontrado = null;

      //Carrega o arquivo XML
     $signos = simplexml_load_file("signos.xml");

     //Loop para percorrer cada signo no arquivo XML
     foreach ($signos->signo as $signo) {
         //Converte as datas do XML (dd/mm) para mês e dia no mesmo formato da data informada
         $data_inicio_partes = explode('/', $signo->dataInicio);
         $data_fim_partes = explode('/', $signo->dataFim);
         $data_inicio = sprintf('%02d%02d', $data_inicio_partes[1], $data_inicio_partes[0]);
         $data_fim = sprintf('%02d%02d', $data_fim_partes[1], $data_fim_partes[0]);


         //Intervalos que cruzam o fim do ano (Capricórnio) precisam de duas comparações
         if ($data_inicio > $data_fim) {
             $esta_no_intervalo = $mes_dia_nascimento >= $data_inicio || $mes_dia_nascimento <= $data_fim;
         } else {
             $esta_no_intervalo = $mes_dia_nascimento >= $data_inicio && $mes_dia_nascimento <= $data_fim;
         }

         if ($esta_no_intervalo) {
             $signo_encontrado = $signo;
             break;
         }
     }
?>

<div class="container mt-5">
    <div  class="card mx-auto shadow text-center p-4 bg-white" style="max-width: 600px;">
        <?php if ($signo_encontrado): ?>
            <h1 class="text-primary display-4 mb-3"><?php echo $signo_encontrado->signoNome; ?></h1>
            <p class="lead text-muted mb-4"><?php echo $signo_encontrado->descricao; ?></p>
        <?php else: ?>
            <h1 class="text-danger mb-3">Signo não encontrado</h1>
            <p class="lead text-muted mb-4">Verifique se as datas no arquivo XML foram cadastradas corretamente.</p>
        <?php endif; ?>
        
        <a href="index.php" class="btn btn-secondary align-self-center">Voltar</a>
    </div>