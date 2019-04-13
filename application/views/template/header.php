<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title><?= $page_title ?> - Advance Management</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#4f8998">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-navbutton-color" content="#4f8998">

    <!-- favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url('assets\favicons\apple-touch-icon-57x57.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets\favicons\apple-touch-icon-114x114.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets\favicons\apple-touch-icon-72x72.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets\favicons\apple-touch-icon-144x144.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url('assets\favicons\apple-touch-icon-60x60.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url('assets\favicons\apple-touch-icon-120x120.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url('assets\favicons\apple-touch-icon-76x76.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url('assets\favicons\apple-touch-icon-152x152.png'); ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('assets\favicons\favicon-196x196.png" sizes="196x196'); ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('assets\favicons\favicon-96x96.png" sizes="96x96'); ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('assets\favicons\favicon-32x32.png" sizes="32x32'); ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('assets\favicons\favicon-16x16.png" sizes="16x16'); ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('assets\favicons\favicon-128.png" sizes="128x128'); ?>" />
    <meta name="application-name" content="Advance Managament" />
    <meta name="msapplication-TileColor" content="#4f8998" />
    <meta name="msapplication-TileImage" content="<?= base_url('assets\favicons\mstile-144x144.png'); ?>" />
    <meta name="msapplication-square70x70logo" content="<?= base_url('assets\favicons\mstile-70x70.png'); ?>" />
    <meta name="msapplication-square150x150logo" content="<?= base_url('assets\favicons\mstile-150x150.png'); ?>" />
    <meta name="msapplication-wide310x150logo" content="<?= base_url('assets\favicons\mstile-310x150.png'); ?>" />
    <meta name="msapplication-square310x310logo" content="<?= base_url('assets\favicons\mstile-310x310.png'); ?>" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('node_modules\bootstrap\dist\css\bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\@fortawesome\fontawesome-free\css\all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\tempusdominus-bootstrap-4\build\css\tempusdominus-bootstrap-4.min.css'); ?>">

    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-bs4\css\dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-autofill-bs4\css\autoFill.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-buttons-bs4\css\buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-colreorder-bs4\css\colReorder.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-fixedcolumns-bs4\css\fixedColumns.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-fixedheader-bs4\css\fixedHeader.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-keytable-bs4\css\keyTable.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-rowgroup-bs4\css\rowGroup.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-rowreorder-bs4\css\rowReorder.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-scroller-bs4\css\scroller.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-select-bs4\css\select.bootstrap4.min.css'); ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets\src\css\custom.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets\src\css\styles.css'); ?>">

    <!-- Chart JS -->
    <link rel="stylesheet" href="<?= base_url('node_modules\chart.js\dist\Chart.min.css'); ?>">

    <!-- JS -->
    <script src="<?= base_url('node_modules\jquery\dist\jquery.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\popper.js\dist\umd\popper.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\bootstrap\dist\js\bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\@fortawesome\fontawesome-free\js\all.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\moment\min\moment-with-locales.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\tempusdominus-bootstrap-4\build\js\tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <script src="<?= base_url('assets\src\js\custom-header.js'); ?>"></script>
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <img id="spinner" src="<?= base_url('assets\images\loading.gif'); ?>" alt="Carregando Sistema" title="Carreganto Sistema">
    </div>

    <header class="col-md-12" id="header">
        <div id="menuIcon" onclick="menuIcon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div id="logo" class="text-center">
            <img src="<?= base_url('assets\images\advance-management-logo.png'); ?>" title="Logotipo - Advance Management" alt="Logotipo - Advance Management" height="44px" />
        </div>
        <div id="headerIcons">
            <button class="hiddenButton d-none d-sm-none d-md-inline d-lg-inline d-xl-inline" data-target="#modalComunicados" data-toggle="modal" data-popover="true" data-placement="bottom" data-trigger="hover" title="Comunicados" data-content="Visualize e crie novos Comunicados.">
                <i class="fas fa-bell icon"></i>
                <div id="badgeComunicados" class="badge">0</div>
            </button>
            <button class="hiddenButton d-none d-sm-none d-md-inline d-lg-inline d-xl-inline" data-target="#modalOcorrencias" data-toggle="modal" data-popover="true" data-placement="bottom" data-trigger="hover" title="Ocorrências internas" data-content="Visualize e crie novas Ocorrências Internas.">
                <i class="fas fa-exclamation-triangle icon"></i>
                <div id="badgeOcorrencias" class="badge">0</div>
            </button>
            <button class="hiddenButton" id="headerPerfil" data-popover="true" data-placement="bottom" data-trigger="hover" title="Seu Perfil" data-content="Veja seu perfil, estastíticas ou mude sua senha.">
                <i class="fas fa-user-circle icon"></i>
            </button>
        </div>
        <div id="headerDropList" class="col-12 col-sm-12 col-md-2 col-xl-2 d-none">
            <ul>
                <li><a href="<?= base_url('#'); ?>"><i class="fas fa-user icon"></i> Meu Perfil</a></li>
                <li><a href="<?= base_url('#'); ?>"><i class="fas fa-user-cog icon"></i> Configurações</a></li>
                <li><a href="<?= base_url('#'); ?>"><i class="fas fa-users icon"></i> Lista de Usuários</a></li>
                <li><a href="<?= base_url('#'); ?>"><i class="fas fa-sign-out-alt icon"></i> Sair</a></li>
            </ul>
        </div>
    </header>
    <div style="height: 80px; display: block;"></div>

    <!-- menu -->
    <div id="menu" class="overflowAuto" style="display: none;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/dashboard'); ?>">
                        <div class="menu-background menu-dashboard" data-popover="true" data-placement="bottom" data-trigger="hover" title="Dashboard" data-content="Acompanhe em tempo real status de operadores, dados de seu faturamento e chamadas.">
                            <i class="fas fa-chart-pie icon"></i>
                            <br />
                            Dashboard
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/discador'); ?>">
                        <div class="menu-background menu-discador" data-popover="true" data-placement="bottom" data-trigger="hover" title="Discador" data-content="Acesse a central operacional do sistema, efetue discagens automaticamente conforme programado por Campanhas, Agendamentos ou atue na área Receptiva.">
                        <i class="fas fa-phone-square icon"></i>
                            <br />
                            Discador
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/realtime'); ?>">
                        <div class="menu-background menu-realtime" data-popover="true" data-placement="bottom" data-trigger="hover" title="Realtime" data-content="Monitore e gerencie em tempo real sua equipe de telemarketing.">
                            <i class="fas fa-clock icon"></i>
                            <br />
                            Realtime
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/ranking'); ?>">
                        <div class="menu-background menu-ranking" data-popover="true" data-placement="bottom" data-trigger="hover" title="Ranking" data-content="Seus operadores agrupados de acordo com metas de faturamento e chamadas.">
                            <i class="fas fa-list-ol icon"></i>
                            <br />
                            Ranking
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/metas'); ?>">
                        <div class="menu-background menu-metas" data-popover="true" data-placement="bottom" data-trigger="hover" title="Metas" data-content="Insira e edite metas de faturamento e chamadas dos operadores.">
                            <i class="fas fa-chart-line icon"></i>
                            <br />
                            Metas
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/pedidos'); ?>">
                        <div class="menu-background menu-pedidos" data-popover="true" data-placement="bottom" data-trigger="hover" title="Pedidos" data-content="Todos os pedidos listados de acordo com o período e operador.">
                            <i class="fas fa-file-invoice-dollar icon"></i>
                            <br />
                            Pedidos
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/chamados'); ?>">
                        <div class="menu-background menu-chamados" data-popover="true" data-placement="bottom" data-trigger="hover" title="Chamados" data-content="Abra um novo chamadó para um operador específico ou analise os demais chamados em aberto.">
                            <i class="fas fa-paste icon"></i>
                            <br />
                            Registro de Chamados
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/comunicados'); ?>">
                        <div class="menu-background menu-comunicados" data-popover="true" data-placement="bottom" data-trigger="hover" title="Comunicados" data-content="Visualize e crie novos comunicados.">
                            <i class="fas fa-bell icon"></i>
                            <br />
                            Comunicados
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/ocorrencias'); ?>">
                        <div class="menu-background menu-ocorrencias" data-popover="true" data-placement="bottom" data-trigger="hover" title="Ocorrências Internas" data-content="Visualize e crie novas ocorrências internas.">
                            <i class="fas fa-exclamation-triangle icon"></i>
                            <br />
                            Ocorrências Internas
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/carteiras'); ?>">
                        <div class="menu-background menu-carteiras" data-popover="true" data-placement="bottom" data-trigger="hover" title="Carteiras" data-content="Confira sua carteira de clientes filtrando por operador e cliente.">
                            <i class="fas fa-id-card icon"></i>
                            <br />
                            Carteiras
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/leads'); ?>">
                        <div class="menu-background menu-leads" data-popover="true" data-placement="bottom" data-trigger="hover" title="Leads" data-content="Insira novos prospects e liste os já existentes.">
                            <i class="fas fa-handshake icon"></i>
                            <br />
                            Leads
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/campapnhas'); ?>">
                        <div class="menu-background menu-campanhas" data-popover="true" data-placement="bottom" data-trigger="hover" title="Campanha de Discagem Automática" data-content="Crie e monitore campanhas de leads e de sua carteira de clientes.">
                            <i class="fas fa-bullhorn icon"></i>
                            <br />
                            Campanha de Discagem<br />Automática
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/mensagem-marketing'); ?>">
                        <div class="menu-background menu-marketing" data-popover="true" data-placement="bottom" data-trigger="hover" title="Mensagem Marketing" data-content="Crie campanhas de mensagens massivas por meio de SMS, EMAIL e MENSAGEM FONADA.">
                            <i class="fas fa-sms icon"></i>
                            <br />
                            Mensagem Marketing
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/agendamentos'); ?>">
                        <div class="menu-background menu-agendamentos" data-popover="true" data-placement="bottom" data-trigger="hover" title="Agendamentos" data-content="Agende ligações para um operador específico e confira os agendamentos perdidos.">
                            <i class="fas fa-calendar-check icon"></i>
                            <br />
                            Agendamentos
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/callback'); ?>">
                        <div class="menu-background menu-callback" data-popover="true" data-placement="bottom" data-trigger="hover" title="Callback" data-content="Confira as ligações abandonadas e não atendidas na fila e agende retorno.">
                            <i class="fas fa-reply icon"></i>
                            <br />
                            Callback
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/voicemail'); ?>">
                        <div class="menu-background menu-voicemail" data-popover="true" data-placement="bottom" data-trigger="hover" title="Voicemail" data-content="Ouça as mensagens deixadas no correio de voz agrupadas por fila.">
                            <span class="fa-layers fa-2x icon">
                                <i class="fas fa-tape fa-flip-horizontal" data-fa-transform="right-5 shrink-3" ></i>
                                <i class="fas fa-tape" data-fa-transform="left-5 shrink-3" ></i>  
                            </span>
                            <br />
                            Voicemail
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/gravacoes'); ?>">
                        <div class="menu-background menu-gravacoes" data-popover="true" data-placement="bottom" data-trigger="hover" title="Gravações" data-content="Ouça todas as chamadas de entrada e saída, contando com filtros para uma busca específica.">
                            <i class="fas fa-headphones-alt icon"></i>
                            <br />
                            Gravações
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/relatórios'); ?>">
                        <div class="menu-background menu-relatorios" data-popover="true" data-placement="top" data-trigger="hover" title="Relatórios" data-content="Otimize suas decisões com o auxílio de relatórios de faturamento, operadores e chamadas.">
                        <i class="fas fa-signal icon"></i>
                            <br />
                            Relatórios
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- header modals -->
    <div class="modal fade" id="modalComunicados" tabindex="-1" role="dialog" aria-labelledby="modalComunicadosTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalComunicadosTitle">Comunicados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalOcorrencias" tabindex="-1" role="dialog" aria-labelledby="modalOcorrenciasTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalOcorrenciasTitle">Ocorrências</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="body-wrapper overflowHidden">