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
                <li><a href=''>Demandas</a></li>
                <li><a href=''>DExPARA</a></li>
                <li><a href=''>Solicitações</a></li>
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