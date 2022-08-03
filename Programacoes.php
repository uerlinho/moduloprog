<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Planejamento | Grade de programação</title>
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
                    <!-- area de navegacao rapida -->
                    <p>Área: <strong>Planejamento (<?php echo $usuario_logado_ATUACAO;?>)</strong></p>
                    <span> 
                        <?php
                            include 'Navegacao_rapida.php';
                        ?>
                    </span>
                </div>
                <main class="painel_principal">
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
                                        ajax: 'programacoesAPI.php', // colocar o link da api selecionando os dados do bd
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
                                    $('#programacoes tbody').on('click', 'td.dt-control', function () {
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
                                <tfoot>
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
                            </table>
                        </div>
                        <div class='desligamento'>
                            
                        </div>
                    </div>
                </main>
            </div>
        </section>
        <!-- rodape da pagina -->
        <?php include 'footer.php';?>
    </body>
</html>
