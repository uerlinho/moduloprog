<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Bases | Relatório Gerencial</title>
        <!-- links auxiliares para a construcao da pagina -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="js/AtualizacaoStatus_PDM.js" defer></script>
        <!-- validacao login -->
        
        <?php
            session_start();
            if (isset($_SESSION) && empty($_SESSION)==false){
                
                $usuario_logado = $_SESSION['USER'];
                $id_usuario_logado = $_SESSION['ID'];
                $usuario_logado_SETOR = $_SESSION['SETOR'];
                $usuario_logado_REGIONAL = $_SESSION['REGIONAL'];
                $usuario_logado_ATUACAO = $_SESSION['ATUACAO'];
            }else{
                header("Location: login.php");
            }
            include "assets/Programacoes_estilo.php";
        ?>
        
    </head>
    <body>
        <section class="principal">
            <!-- sessão de navegação -->
            <div class="menu">
                <nav>
                    <?php
                        echo "
                        <ul class='sub-menu'>
                            <li class='titulo_lista'>".$usuario_logado."</li>
                            <div class='sub-sub-menu'>
                                <li onclick='abrirSubMenu1()'>Bases</li>
                                <div id='sub-sub-sub-menu-1'>
                                    <li><a href=''>Relatório Gerencial</a></li>
                                    <li><a href=''>Tabela B2</a></li>
                                    <li><a href=''>Input Bases</a></li>
                                </div>
                                <li onclick='abrirSubMenu2()'>Planejamento</li>
                                <div id='sub-sub-sub-menu-2'>
                                    <li><a href=''>Programações</a></li>
                                    <li><a href=''>Calendário</a></li>
                                    <li><a href=''>Quadro de liberação</a></li>
                                    <li><a href=''>Desligamentos</a></li>
                                    <li><a href=''>Requisição de Material</a></li>
                                </div>
                                <li onclick='abrirSubMenu3()'>Encerramento</li>
                                <div id='sub-sub-sub-menu-3'>
                                    <li><a href=''>Obras programadas</a></li>
                                    <li><a href=''>Investimento operacional</a></li>
                                    <li><a href=''>DExPARA</a></li>
                                    <li><a href=''>Pendências</a></li>
                                </div>
                                <li onclick='abrirSubMenu4()'>Relatórios</li>
                                <div id='sub-sub-sub-menu-4'>
                                    <li><a href=''>Programações</a></li>
                                    <li><a href=''>Histórico</a></li>
                                </div>    
                            </div>
                        </ul>
                        ";
                    ?>
                </nav>
            </div>
            <div class="painel">
                <div class="aba_rapida">
                    <p>Área: <strong>Planejamento (<?php echo $usuario_logado_ATUACAO;?>)</strong></p>
                    <span> 
                        <?php
                            //$id_usuario_logado = $_SESSION['ID'];
                            require "nav_Gestao_PROG.php";
                        ?>
                    </span>
                </div>
                <div class="painel_principal">
                    <div class="tabela_niv">
                        <div class="tabela_niv_title">Obras</div>
                        <script>
                            $(document).ready(function () {
                                // Setup - add a text input to each footer cell
                                $('#demandas_prog tfoot th').each(function () {
                                    var title = $(this).text();
                                    $(this).html('<input type="text" />');
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
                                    <th>PEP</th>
                                    <th>Nome da Obra</th>
                                    <th>Nota</th>
                                    <th>SAP</th>
                                    <th>Status</th>
                                    <th>Seccional</th>
                                    <th>Regional</th>
                                    <th>Segmento</th>
                                    <th>Torre</th>
                                    <th>Disposto</th>
                                    <th>Prazo de Conclusão</th>
                                    <th>Ação</th>
                                    <th>Andamento</th>
                                    <th>Localização</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require "config_bd.php";
                                    $banco_de_obras = $pdo->query("SELECT gpm_base_obras.*, gpm_status_corresp.STATUS_CORRESP AS STATUS_CORRESP,
                                    gpm_municipios.SECCIONAL AS SECCIONAL, gpm_gerenciaPorPI.TORRE AS TORRE, gpm_gerenciaPorPI.GERENCIA AS GERENCIA FROM gpm_base_obras
                                    LEFT JOIN gpm_status_corresp
                                    ON gpm_status_corresp.STATUS_NOTA=gpm_base_obras.STATUS_NOTA
                                    LEFT JOIN gpm_municipios
                                    ON gpm_municipios.CIDADE=gpm_base_obras.MUNICIPIO
                                    LEFT JOIN gpm_gerenciaPorPI
                                    ON gpm_gerenciaPorPI.PI=gpm_base_obras.PI 
                                    WHERE STATUS_CORRESP!='1. Banco de Projetos' AND PARCEIRA LIKE '%CONTROL%'
                                    AND TORRE!='2022 - EME' AND TORRE!='2021 - EME'");
                                    if ($banco_de_obras->RowCount()>0){
                                        foreach($banco_de_obras->fetchAll() as $obras){
                                            echo "
                                            <tr>
                                                <td>".utf8_encode($obras['PEP_NV3'])."</td>
                                                <td>".utf8_encode($obras['DESCRICAO'])."</td>
                                                <td>".utf8_encode($obras['NOTA'])."</td>
                                                <td>".utf8_encode($obras['STATUS_CORRESP'])."</td>
                                                <td>Programado</td>
                                                <td>".$obras['SECCIONAL']."</td>
                                                <td>".utf8_encode($obras['REGIONAL'])."</td>
                                                <td>".utf8_encode($obras['GERENCIA'])."</td>
                                                <td>".utf8_encode($obras['TORRE'])."</td>
                                                <td>".number_format($obras['ORCADO_FINAL'], 2, ',', '.')."</td>
                                                <td>0000-00-00</td>
                                                <td><a class='btn btn-primary' data-toggle='modal' data-target='#modal-obras-programacao".$obras['ID']."'>Programar</a></td>
                                                <td><a class='btn btn-primary' data-toggle='modal' data-target='#modal-consulta-andamento-obras".$obras['ID']."'>Consultar</a></td>
                                                <td><a href='https://www.google.com/maps/search/?api=1&query=".$obras['LATITUDE']."%2C".$obras['LONGITUDE']."' target='_blanck'><img style='width: 25px; height: 25px;' src='images/marcador.png' alt='geo_loc'/></a></td>
                                            </tr>
                                            <div class='modal fade' id='modal-obras-programacao".$obras['ID']."'>
                                                <div class='modal-dialog modal-lg'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <button type='button' class='close' data-dismiss='modal'><span>×</span></button>
                                                            <h5 class='modal-title'><img src='images/calendar.png' style='width: 20px;height:20px;' />  ".$obras['PEP_NV3']." - ".$obras['DESCRICAO']."</h5>
                                                        </div>
                                                        <div class='modal-body'>";
                                                            if (utf8_encode($obras['STATUS_CORRESP'])=='5. Concluida no Sistema' || utf8_encode($obras['STATUS_CORRESP'])=='4. Concluida em Campo'){
                                                                echo "Obra já se encontra concluída.";
                                                            } else{
                                                                echo "Em construção...";
                                                            }
                                                        echo "
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='modal fade' id='modal-consulta-andamento-obras".$obras['ID']."'>
                                                <div class='modal-dialog modal-lg'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <button type='button' class='close' data-dismiss='modal'><span>×</span></button>
                                                            <h4 class='modal-title' style='font-size:14px;'>Andamento da demanda [<strong>".$obras['PEP_NV3']."</strong>]</h4>
                                                        </div>
                                                        <div class='modal-body'> 

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            ";
                                        }
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>PEP</th>
                                    <th>Nome da Obra</th>
                                    <th>Nota</th>
                                    <th>SAP</th>
                                    <th>Status</th>
                                    <th>Seccional</th>
                                    <th>Regional</th>
                                    <th>Gerencia</th>
                                    <th>Torre</th>
                                    <th>Disposto</th>
                                    <th>Prazo de Conclusão</th>
                                    <th>Ação</th>
                                    <th>Andamento</th>
                                    <th>Location</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
        </section>
        <footer>
            <div id='parte-1'>...</div>
            <div id='parte-2'>...</div>
        </footer>
    </body>
</html>
