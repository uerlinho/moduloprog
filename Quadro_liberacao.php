<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Planejamento | Quadro de liberação de obras</title>
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
                <!-- area principal -->
                <main class="painel_principal">
                    <div class="tabela_niv">
                        <div class="tabela_niv_title">Quadro de liberação de obras</div>
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
                                    <th>Data de programação</th>
                                    <th>Prazo para liberação</th>
                                    <th>Gerência</th>
                                    <th>Disposto</th>
                                    <th>Atribuído</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>PEP</td>
                                    <td>Nome da Obra</td>
                                    <td>Nota</td>
                                    <td>SAP</td>
                                    <td>Status</td>
                                    <td>Data de programação</td>
                                    <td>Prazo para liberação</td>
                                    <td>Gerência</td>
                                    <td>Disposto</td>
                                    <td>Atribuído</td>
                                    <td>Ação</td>
                                </tr>
                            </tbody>
                            <div>
                                ...
                            </div>
                            <tfoot>
                                <tr>
                                    <th>PEP</th>
                                    <th>Nome da Obra</th>
                                    <th>Nota</th>
                                    <th>SAP</th>
                                    <th>Status</th>
                                    <th>Data de programação</th>
                                    <th>Prazo para liberação</th>
                                    <th>Gerência</th>
                                    <th>Disposto</th>
                                    <th>Atribuído</th>
                                    <th>Ação</th>
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
