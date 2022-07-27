<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Bases | Tabela B2</title>
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
                                    <li><a href=''>Programações<span class='qnt_pend'>45</span></a></li>
                                    <li><a href=''>Calendário</a></li>
                                    <li><a href=''>Quadro de liberação</a></li>
                                    <li><a href=''>Desligamentos</a></li>
                                    <li><a href=''>Requisição de Material</a></li>
                                    <li><a href=''>Diagrama de Gantt (em breve)</a></li>
                                </div>
                                <li onclick='abrirSubMenu3()'>Encerramento</li>
                                <div id='sub-sub-sub-menu-3'>
                                    <li><a href=''>Obras programadas<span class='qnt_pend'>45</span></a></li>
                                    <li><a href=''>Investimento operacional<span class='qnt_pend'>45</span></a></li>
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
                </div>
            </div>
        </section>
        <div id='topo'>Topo</div>
        <footer>
            <div id='parte-1'>...</div>
            <div id='parte-2'>...</div>
        </footer>
    </body>
</html>
