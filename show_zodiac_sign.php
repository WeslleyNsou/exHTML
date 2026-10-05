<?php
     include('header.php'); 

     //Recebe a data de nascimento do formulário
    $data_nascimento = $_POST['data_nascimento'];

    //Transforma a data recebita(dd/mm/yyyy) para o formato de comparação (dd/mm)
    $data_objeto = new DateTime($data_nascimento);
    $dia_mes_nascimento = $data_objeto->format('d/m');

    $signos = simplexml_load_file("signos.xml");

    //Loop para percorrer cada signo no arquivo XML
    foreach ($signos->signo as $signo) {
        //converte as datas do XML (ex: 21/03) para o formato padrão do PHP (ano-mês-dia) para validação correta
        $data_inicio_partes = explode('/', $signo->dataInicio);
        $data_fim_partes = explode('/', $signo->dataFim);
        
        $data_inicio_ajustada = DateTime::createFromFormat('d/m/Y', $data_inicio_partes[0] . '/' . $data_inicio_partes[1] . '/' . $data_objeto->format('Y'));
        $data_fim_ajustada = DateTime::createFromFormat('d/m/Y', $data_fim_partes[0] . '/' . $data_fim_partes[1] . '/' . $data_objeto->format('Y'));

        //Caso especial: Capricórnio (vira o ano de Dezembro para Janeiro)
        if ($data_inicio_ajustada > $data_fim_ajustada) {
            if ($data_objeto >= $data_inicio_ajustada || $data_objeto <= $data_fim_ajustada->modify('+1 year')) {
                $signo_encontrado = $signo;
                break;
            }
            $data_fim_ajustada->modify('-1 year'); // desfaz alteração caso não entre
        }else{
            //Validação padrão dentro do mesmo ano corporativo
            if ($data_objeto >= $data_inicio_ajustada && $data_objeto <= $data_fim_ajustada) {
                $signo_encontrado = $signo;
                break;
            }
        }
    }
?>

<div class="container mt-5">
    <div class="card mx-auto shadow text-center p-4 bg-white" style="max-width: 600px;">
        <?php if ($signo_encontrado): ?>
            <h1 class="text-primary display-4 mb-3"><?php echo $signo_encontrado->signoNome; ?></h1>
            <p class="lead text-muted mb-4"><?php echo $signo_encontrado->descricao; ?></p>
        <?php else: ?>
            <h1 class="text-danger mb-3">Signo não encontrado</h1>
            <p class="lead text-muted mb-4">Verifique se as datas no arquivo XML foram cadastradas corretamente.</p>
        <?php endif; ?>
        
        <a href="index.php" class="btn btn-secondary align-self-center">Voltar</a>
    </div>