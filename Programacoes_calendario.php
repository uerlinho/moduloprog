<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Planejamento | Calendário</title>
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
            include "Programacoes_estilo.php";
        ?>
        <!-- configurações do calendario -->
        <link href='lib/main.css' rel='stylesheet' />
        <script src="js/AtualizacaoStatus_PDM.js" defer></script>
        <script src='lib/main.js'></script>
        <script src='lib/locales-all.js'></script>
        <script> // script do calendario
            document.addEventListener('DOMContentLoaded', function() {
                var initialLocaleCode = 'pt-br';
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: '2022-06-20',
                locale: initialLocaleCode,
                buttonIcons: false, // show the prev/next text
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    {
                        'title':'teste',
                        'start':'2022-07-26',
                        'end':'2022-07-26'
                    }
                ]
                });

                calendar.render();

                // build the locale selector's options
                calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                var optionEl = document.createElement('option');
                optionEl.value = localeCode;
                optionEl.selected = localeCode == initialLocaleCode;
                optionEl.innerText = localeCode;
                localeSelectorEl.appendChild(optionEl);
                });

                // when the selected option changes, dynamically change the calendar option
                localeSelectorEl.addEventListener('change', function() {
                if (this.value) {
                    calendar.setOption('locale', this.value);
                }
                });

            });
        </script>
        <style>
            #calendar {
                margin: 5px;
                padding: auto;
            }
        </style>
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
                            require "nav_Gestao_PROG.php";
                        ?>
                    </span>
                </div>
                <div class="painel_principal">
                    <div class="tabela_niv">
                        <div class="tabela_niv_title">Filtros</div>
                        <form>
                            <select>
                                <option selected disabled>Segmento</option>
                                <option>Despesa</option>
                                <option>Investimento</option>
                            </select>
                            <select>
                                <option selected disabled>Gerência</option>
                                <option>Expansão MT/BT</option>
                                <option>Manutenção MT/BT</option>
                            </select>
                            <select>
                                <option selected disabled>Seccional</option>
                                <option>Norte</option>
                                <option>Metropolitana</option>
                            </select>
                        </form>
                    </div>
                    <div class="tabela_niv">
                        <div class="tabela_niv_title">Calendário de programações</div>
                        <div id='calendar'></div>
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
