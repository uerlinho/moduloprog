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
                                    <li><a href=''>Brecha na programação</a></li>
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
                                    <li><a href=''>Notificações</a></li>
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
                        <div class="tabela_niv_title">Programações</div>
                        <div class='aba' id='aba-1' onclick="ChamarDivGrade()">Grade de programação<span class='notification'>10</span></div>
                        <div class='aba' id='aba-2' onclick="ChamarDivDeslig()">Solicitações<span class='notification'>6</span></div>
                        <a class='btn btn-primary' data-toggle='modal' data-target='#modal-obras-programacao'>Solicitar demanda</a>
                        <div class='grade-prog'>
                            <!-- script que traz as funcionalidades do datatables -->
                            <script>
                                /* Formatting function for row details - modify as you need */
                                function format(d) {
                                    // `d` is the original data object for the row
                                    return (
                                        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                                        '<tr>' +
                                        '<td>Full name:</td>' +
                                        '<td>' +
                                        d.servico +
                                        '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td>Extension number:</td>' +
                                        '<td>' +
                                        d.status_prazo +
                                        '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td>Extra info:</td>' +
                                        '<td>And any further details here (images etc)...</td>' +
                                        '</tr>' +
                                        '</table>'
                                    );
                                }
                                
                                $(document).ready(function () {
                                    var table = $('#programacoes').DataTable({
                                        ajax: 'assets/programacoes.txt', // colocar o link da api selecionando os dados do bd
                                        columns: [
                                            {
                                                className: 'dt-control',
                                                orderable: false,
                                                data: null,
                                                defaultContent: '',
                                            },
                                            { data: 'demanda' },
                                            { data: 'segmento' },
                                            { data: 'nota' },
                                            { data: 'nome' },
                                            { data: 'local_obra' },
                                            { data: 'programador' },
                                            { data: 'inicio' },
                                            { data: 'fim' },
                                            { data: 'etapa' },
                                            { data: 'deslig' },
                                            { data: 'tipo_si' },
                                            { data: 'prazo_si' },
                                            { data: 'data_prazo' },
                                            { data: 'status_prog' }
                                        ],
                                        order: [[1, 'asc']],
                                    });
                                
                                    // Add event listener for opening and closing details
                                    $('#example tbody').on('click', 'td.dt-control', function () {
                                        var tr = $(this).closest('tr');
                                        var row = table.row(tr);
                                
                                        if (row.child.isShown()) {
                                            // This row is already open - close it
                                            row.child.hide();
                                            tr.removeClass('shown');
                                        } else {
                                            // Open this row
                                            row.child(format(row.data())).show();
                                            tr.addClass('shown');
                                        }
                                    });
                                });   
                            </script>
                            <!-- tabela com os dados das programacoes -->
                            <table id="programacoes" class="display" style="width:100%"> 
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Demanda</th>
                                        <th>Segmento</th>
                                        <th>Nota</th>
                                        <th>Nome</th>
                                        <th>Município</th>
                                        <th>Programador</th>
                                        <th>Inicio</th>
                                        <th>Fim</th>
                                        <th>Etapa</th>
                                        <th>Desligamento?</th>
                                        <th>Tipo de SI</th>
                                        <th>Prazo de criação SI</th>
                                        <th>Prazo de execução</th>
                                        <th>Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>6000425910</td>
                                        <td>Despesa</td>
                                        <td>Não se aplica</td>
                                        <td>PDM-ORDINSP-6000422713-TBM01Y6-TBM01Y6</td>
                                        <td>Atalaia</td>
                                        <td>WESLEY.SANTOS</td>
                                        <td>30/07/2022 21:54:00</td>
                                        <td>30/07/2022 21:54:00</td>
                                        <td>1</td>
                                        <td>Sim</td>
                                        <td>Bloqueio</td>
                                        <td>01/09/2022</td>
                                        <td>05/08/2022</td>
                                        <td>Programado</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='desligamento'>
                            
                        </div>
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
