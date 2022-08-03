<?php
    echo "
    <ul class='sub-menu'>
        <li class='titulo_lista'>".$usuario_logado."</li>
        <div class='sub-sub-menu'>
            <li onclick='abrirSubMenu1()'>Bases</li>
            <div id='sub-sub-sub-menu-1'>
                <li><a href='Demandas_Invest.php'>Relatório Gerencial</a></li>
                <li><a href='Demandas_Despesa.php'>Tabela B2</a></li>
                <li><a href='Input_bases.php'>Input Bases</a></li>
            </div>
            <li onclick='abrirSubMenu2()'>Planejamento</li>
            <div id='sub-sub-sub-menu-2'>
                <li><a href='Programacoes.php'>Programações</a></li>
                <li><a href='Programacoes_calendario.php'>Calendário</a></li>
                <li><a href='Quadro_liberacao.php'>Quadro de liberação</a></li>
                <li><a href='Desligamentos.php'>Desligamentos</a></li>
                <li><a href='Requisicoes_material.php'>Requisição de Material</a></li>
            </div>
            <li onclick='abrirSubMenu3()'>Encerramento</li>
            <div id='sub-sub-sub-menu-3'>
                <li><a href='Encerramento_obras.php'>Demandas</a></li>
                <li><a href='dexpara.php'>DExPARA</a></li>
                <li><a href='Solicitacoes.php'>Solicitações</a></li>
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