<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Planejamento | Calendário de demandas</title>
        <?php
            // validacao login + inclusão do arquivo do estilo da pagina
            include 'validacao_login.php';
            include 'assets/Programacoes_estilo.php';
        ?>
        <!-- configurações do calendario -->
        <link href='lib/main.css' rel='stylesheet' />
        <script src='lib/main.js'></script>
        <script src='lib/locales-all.js'></script>
        <!-- script para manipulação da pagina -->
        <script src="js/AtualizacaoStatus_PDM.js" defer></script>
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
                </main>
            </div>
        </section>
        <!-- rodape da pagina -->
        <?php include 'footer.php';?>
    </body>
</html>
