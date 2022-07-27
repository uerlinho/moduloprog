<?php
    session_start();
    if (isset($_SESSION) && empty($_SESSION)==false){
        $usuario_logado = $_SESSION['USER'];
    }else{
        header("Location: login.php");
    }
    require "config_bd.php";
    //receber os dados do formulario
    $DadosProgr = filter_input_array(INPUT_GET, FILTER_DEFAULT);
    $segmento = 'Despesa';
    // echo "<pre>";
    // print_r($DadosProgr);
    // echo "</pre>";
    $i = count($DadosProgr['inicioProg']);
    for ($j = 0; $j < $i; $j++){
        switch ($DadosProgr['TipoDeslig'][$j]){
            case 'Bloqueio':
                $prazo_si = date("Y-m-d", strtotime("- 2 days", strtotime(date('Y-m-d', strtotime($DadosProgr['inicioProg'][$j]))))); // 
                break;
            case 'Outros':
                $prazo_si = date("Y-m-d", strtotime("- 15 days", strtotime(date('Y-m-d', strtotime($DadosProgr['inicioProg'][$j])))));
                break;
            case 'Bloqueio+Outros':
                $prazo_si = date("Y-m-d", strtotime("- 15 days", strtotime(date('Y-m-d', strtotime($DadosProgr['inicioProg'][$j])))));
                break;
            default:
            $prazo_si = '0000-00-00'; // nao tem desligamento
        }
        $etapa = $j + 1;
        $NAME = "PDM-ORDINSP-".$DadosProgr['ordem_insp']."-".$DadosProgr['componente']."-".$DadosProgr['alimentador'];
        $inserir_prog = $pdo->query("INSERT INTO gpm_programacoes (DEMANDA, SEGMENTO, NOME, PROGRAMADOR, INICIO, FIM, DESLIG, TIPO_SI, PRAZO_SI, ETAPA, DATA_PRAZO, STATUS_PRAZO, AL, COMP, EQUIPE_1, EQUIPE_2, EQUIPE_3, EQUIPE_4, EQUIPE_5, LOCAL_OBRA, NOTA_CTRL, ITEM, SERVICO, DEFEITOS) VALUES('".$DadosProgr['demanda']."', '".$segmento."', '".$NAME."', '".$usuario_logado."', '".$DadosProgr['inicioProg'][$j]."', '".$DadosProgr['fimProg'][$j]."', '".utf8_encode($DadosProgr['NecessDeslig'][$j])."', '".$DadosProgr['TipoDeslig'][$j]."', '".$prazo_si."', '".$etapa."', '".$DadosProgr['prazo_exec']."', '".$DadosProgr['status_prazo']."', '".$DadosProgr['alimentador']."', '".$DadosProgr['componente']."', '".$DadosProgr['Equipe_1'][$j]."', '".$DadosProgr['Equipe_2'][$j]."', '".$DadosProgr['Equipe_3'][$j]."', '".$DadosProgr['Equipe_4'][$j]."', '".$DadosProgr['Equipe_5'][$j]."', '".$DadosProgr['seccional']."', '".utf8_encode($DadosProgr['nota-ctrl'][$j])."', '".$DadosProgr['item']."', '".utf8_encode($DadosProgr['servico'])."','".$DadosProgr['defeito'][$j]."')");
    }
    header("Location: Demandas_Despesa.php");
?>
