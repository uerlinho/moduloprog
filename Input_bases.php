<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Bases | Atualização das bases</title>
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
                        <div class="tabela_niv_title">Atualização das bases</div>
                        <form class='form-base' action="analisa_relatorioGerencial.php" method="POST" enctype="multipart/form-data">
                            <div class='analisa-base'>
                                <label>Nenhum arquivo escolhido
                                    <input type='file' name='relatorioGerencial' accept='text/xml'/>
                                </label>
                                <button>Enviar</button>
                            </div>
                            <div class='dados-base'>
                                <span>Última atualização: 22/07/2022 22:30</span>
                            </div>
                        </form>
                        <form class='form-base' action="analisa_tabelaB2.php" method="POST" enctype="multipart/form-data">
                            <div class='analisa-base'>
                                <label>Nenhum arquivo escolhido
                                    <input type='file' name='tabelaB2' accept='text/xml'/>
                                </label>
                                <button>Enviar</button>
                            </div>
                            <div class='dados-base'>
                                <span>Última atualização: 22/07/2022 22:30</span>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </section>
        <!-- rodape da pagina -->
        <?php include 'footer.php';?>
    </body>
</html>
