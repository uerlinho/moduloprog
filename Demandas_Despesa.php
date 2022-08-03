<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Bases | Tabela B2</title>
        <!-- link css para a criacao dos modais Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- link css para a criacao da tabela DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <!-- script js para criacao dos modais Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- script js para criacao da tabela DataTables -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <!-- script para manipulação da pagina -->
        <script src="js/AtualizacaoStatus_PDM.js" defer></script>
        <?php
            // validacao login + inclusão do arquivo do estilo da pagina
            include 'validacao_login.php';
            include 'assets/Programacoes_estilo.php';
        ?>
    </head>
    <body>
        <section class="principal">
            <!-- menu de navegação -->
            <div class="menu">
                <nav>
                    <?php include 'menu.php';?>
                </nav>
            </div>
            <div class="painel">
                <div class="aba_rapida">
                    <p>Área: <strong>Planejamento (<?php echo $usuario_logado_ATUACAO;?>)</strong></p>
                    <span> 
                        <?php
                            include 'Navegacao_rapida.php';
                        ?>
                    </span>
                </div>
                <main class="painel_principal">
                    <div class="tabela_niv">
                    <div class="tabela_niv_title">Cenário de pendências</div>
                        <select>
                            <option selected disabled>Selecione a Seccional...</option>
                            <option>Metropolitana</option>
                            <option>Norte</option>
                        </select>
                    </div>
                    <div class="tabela_niv">
                        <div class="tabela_niv_title">Plano de Manutenção</div>
                        <script>
                            $(document).ready(function () {
                                // Setup - add a text input to each footer cell
                                $('#demandas_prog tfoot th').each(function () {
                                    var title = $(this).text();
                                    $(this).html('<input type="text" placeholder="'+title+'"/>');
                                });
                                // DataTable
                                var table = $('#demandas_prog').DataTable({
                                    "language":{
                                        "sEmptyTable": "Sem registros localizados.",
                                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                                        "sInfoPostFix": "",
                                        "sInfoThousands": ".",
                                        "sLengthMenu": "_MENU_ resultados por página",
                                        "sLoadingRecords": "Carregando...",
                                        "sProcessing": "Processando...",
                                        "sZeroRecords": "Sem registros localizados.",
                                        "sSearch": "Pesquisar",
                                        "oPaginate": {
                                            "sNext": "Próximo",
                                            "sPrevious": "Anterior",
                                            "sFirst": "Primeiro",
                                            "sLast": "Último"
                                        },
                                        "oAria": {
                                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                                            "sSortDescending": ": Ordenar colunas de forma descendente"
                                        }
                                    },
                                    initComplete: function () {
                                        // Apply the search
                                        this.api()
                                            .columns()
                                            .every(function () {
                                                var that = this;
                            
                                                $('input', this.footer()).on('keyup change clear', function () {
                                                    if (that.search() !== this.value) {
                                                        that.search(this.value).draw();
                                                    }
                                                });
                                            });
                                    },
                                });
                            });
                        </script>
                        <table id="demandas_prog">
                            <thead>
                                <tr>
                                    <th>Seccional</th>
                                    <th>Ordem de Inspeção</th>
                                    <th>Ordem de Execução</th>
                                    <th>Data de Inspeção</th>
                                    <th>Prioridade</th>
                                    <th>Componente</th>
                                    <th>Status</th>
                                    <th>Item</th>
                                    <th>Defeitos</th>
                                    <th>Programação</th>
                                    <th>Equipe</th>
                                    <th>Ação</th>
                                    <th>Localização</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require "config_bd.php";
                                    $plano_manutencao = $pdo->query("SELECT * FROM gpm_pdm");
                                    $equipes = $pdo->query("SELECT EQUIPE FROM gpm_equipes WHERE REGIONAL='$usuario_logado_REGIONAL'");
                                    $count_equipes = $pdo->query("SELECT COUNT(*) FROM gpm_equipes WHERE REGIONAL='$usuario_logado_REGIONAL'");
                                    $quant_equipes = $count_equipes->fetchColumn();
                                    if ($plano_manutencao->rowCount()>0){
                                        foreach($plano_manutencao->fetchAll() as $pdm){
                                            echo "
                                            <tr>
                                                <td>".$pdm['SECCIONAL']."</td>
                                                <td>".$pdm['ORDEM_INSPECAO']."</td>
                                                <td>".$pdm['ORDEM_DE_EXECUCAO']."</td>
                                                <td>".$pdm['DATA_INSPECAO']."</td>
                                                <td>".$pdm['PRIO_DEF']."</td>
                                                <td>".$pdm['N_COMP_INSPECAO']."</td>
                                                <td>".$pdm['STATUS_EXECUCAO']."</td>
                                                <td>".$pdm['ITEM']."</td>
                                                <td>".$pdm['QUANTIDADE_DEFEITOS']."</td>
                                                <td>Teste</td>
                                                <td>".$pdm['EQUIPE_EXECUCAO']."</td>
                                                <td><a class='btn btn-primary' data-toggle='modal' data-target='#modal-pdm-programacao".$pdm['ID']."'>Programar</a></td>
                                                <td><a href='https://www.google.com/maps/search/?api=1&query=".$pdm['LATITUDE']."%2C".$pdm['LONGITUDE']."' target='_blanck'><img style='width: 25px; height: 25px;' src='images/marcador.png' alt='geo_loc'/></a></td>
                                            </tr>
                                            <div class='modal fade' id='modal-pdm-programacao".$pdm['ID']."'>
                                                <div class='modal-dialog modal-lg'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <button type='button' class='close' data-dismiss='modal'><span>×</span></button>
                                                            <p>Inserir na grade de programação | Ordem exec ".$pdm['ORDEM_DE_EXECUCAO']."</p>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form id='area-prog-".$pdm['ID']."' action='inserir_prog.php' method='GET'>
                                                                <input type='hidden' name='demanda' value='".$pdm['ORDEM_DE_EXECUCAO']."'/>
                                                                <input type='hidden' name='ordem_insp' value='".$pdm['ORDEM_INSPECAO']."'/>
                                                                <input type='hidden' name='alimentador' value='".$pdm['SEAL']."'/>
                                                                <input type='hidden' name='componente' value='".$pdm['N_COMP_INSPECAO']."'/>
                                                                <input type='hidden' name='prazo_exec' value='".$pdm['PRAZO_EXEC']."'/>
                                                                <input type='hidden' name='status_prazo' value='".$pdm['STATUS_EXECUCAO']."'/>
                                                                <input type='hidden' name='seccional' value='".$pdm['SECCIONAL']."'/>
                                                                <input type='hidden' name='item' value='".$pdm['ITEM']."'/>
                                                                <input type='hidden' name='servico' value='".$pdm['SERVICO']."'/>
                                                                <div id='etapa-1'>
                                                                    Início<input type='datetime-local' name='inicioProg[]' />
                                                                    Fim<input type='datetime-local' name='fimProg[]' /><hr/>
                                                                    <div class='tabela_niv_title'>Dados complementares</div>
                                                                    <select name='NecessDeslig[]'>
                                                                        <option selected disabled>Necessita de desligamentos?</option>
                                                                        <option>Sim</option>
                                                                        <option>Não</option>
                                                                    </select>
                                                                    <select name='TipoDeslig[]'>
                                                                        <option selected disabled>Tipo de SI</option>
                                                                        <option>N/A</option>
                                                                        <option>Bloqueio</option>
                                                                        <option>Outros</option>
                                                                        <option>Bloqueio+Outros</option>
                                                                    </select>
                                                                    Defeitos<input type='number' name='defeito[]' /><hr/>
                                                                    <div class='tabela_niv_title'>Equipes executantes</div>";
                                                                    for ($i = 1; $i < 6; $i++){ 
                                                                        echo "
                                                                        <select id='equipe_".$i."' name='Equipe_".$i."[]' data-equipes='".$quant_equipes."'>
                                                                            <option selected disabled>Equipe ".$i."</option>
                                                                            <option>null</option>";    
                                                                                if($equipes->rowCount() > 0){
                                                                                    $j = 1;
                                                                                    foreach($equipes->fetchAll() as $lista_equipe){
                                                                                        echo "<option id='equipe_option".$j."'>".$lista_equipe['EQUIPE']."</option>";
                                                                                        $j+=1;
                                                                                    }
                                                                                } else{
                                                                                    echo "<option>Sem equipes cadastradas.</option>";
                                                                                }
                                                                        echo "</select>";
                                                                    };
                                                                    echo"<hr/>
                                                                    <textarea name='nota-ctrl[]' placeholder='Nota Control.'></textarea>
                                                                </div>
                                                                </hr>
                                                                Programador<input type='text' name='programador' value='".$usuario_logado."' disabled />
                                                                <button type='button' onclick='NovaEtapa(".$pdm['ID'].")'>+ etapa</button>
                                                                <button>Programar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                        }
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Seccional</th>
                                <th>Ordem de Inspeção</th>
                                <th>Ordem de Execução</th>
                                <th>Data de Inspeção</th>
                                <th>Prioridade</th>
                                <th>Componente</th>
                                <th>Conjunto</th>
                                <th>Item</th>
                                <th>Defeitos</th>
                                <th>Programação</th>
                                <th>Equipe</th>
                                <th>Ação</th>
                                <th>Localização</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </main>
            </div>
        </section>
        <!-- rodape da pagina -->
        <?php include 'footer.php';?>
    </body>
</html>
