<?php
    require "config_bd.php";
    $programacoes = $pdo->query("SELECT * FROM gpm_programacoes");
    $programacoes_array = [];
    foreach($programacoes->fetchAll() as $dados_prog){
        $programacoes_array[] = [
            'demanda' => $dados_prog['DEMANDA'],
            'segmento' => $dados_prog['SEGMENTO'],
            'nota' => utf8_encode($dados_prog['NOTA']),
            'nome' => utf8_encode($dados_prog['NOME']),
            'programador' => $dados_prog['PROGRAMADOR'],
            'inicio' => $dados_prog['INICIO'],
            'fim' => $dados_prog['FIM'],
            'deslig' => utf8_encode($dados_prog['DESLIG']),
            'tipo_si' => $dados_prog['TIPO_SI'],
            'prazo_si' => $dados_prog['PRAZO_SI'],
            'etapa' => $dados_prog['ETAPA'],
            'data_prazo' => $dados_prog['DATA_PRAZO'],
            'status_prazo' => $dados_prog['STATUS_PRAZO'],
            'al' => $dados_prog['AL'],
            'comp' => $dados_prog['COMP'],
            'equipe_1' => $dados_prog['EQUIPE_1'],
            'equipe_2' => $dados_prog['EQUIPE_2'],
            'equipe_3' => $dados_prog['EQUIPE_3'],
            'equipe_4' => $dados_prog['EQUIPE_4'],
            'equipe_5' => $dados_prog['EQUIPE_5'],
            'local_obra' => utf8_encode($dados_prog['LOCAL_OBRA']),
            'status_prog' => $dados_prog['STATUS_PROG'],
            'justificativa' => utf8_encode($dados_prog['JUSTIFICATIVA']),
            'nota_ctrl' => utf8_encode($dados_prog['NOTA_CTRL']),
            'nota_eqtl' => utf8_encode($dados_prog['NOTA_EQTL']),
            'item' => $dados_prog['ITEM'],
            'servico' => utf8_encode($dados_prog['SERVICO']),
            'poste_bt' => $dados_prog['POSTE_BT'],
            'poste_mt' => $dados_prog['POSTE_MT'],
            'cabo_bt' => $dados_prog['CABO_BT'],
            'cabo_mt' => $dados_prog['CABO_MT'],
            'trafo' => $dados_prog['TRAFO'],
            'equipamento' => $dados_prog['EQUIPAMENTO'],
            'chave' => $dados_prog['CHAVE'],
            'medidor' => $dados_prog['MEDIDOR']
        ];
    };
    $json = json_encode($programacoes_array);
    ECHO $json;
?>