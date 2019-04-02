<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Advance Management</title>
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
    </header>
    <div style="height: 80px; display: block;"></div>

    <!-- menu -->
    <div id="menu" class="overflowAuto" style="display: none;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/dashboard'); ?>">
                        <div class="menu-background menu-dashboard" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Dashboard" data-content="Acompanhe em tempo real status de operadores, dados de seu faturamento e chamadas.">
                            <i class="fas fa-chart-pie icon"></i>
                            <br />
                            Dashboard
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/ranking'); ?>">
                        <div class="menu-background menu-ranking" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Ranking" data-content="Seus operadores agrupados de acordo com metas de faturamento e chamadas.">
                            <i class="fas fa-list-ol icon"></i>
                            <br />
                            Ranking
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/metas'); ?>">
                        <div class="menu-background menu-metas" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Metas" data-content="Insira e edite metas de faturamento e chamadas dos operadores.">
                            <i class="fas fa-chart-line icon"></i>
                            <br />
                            Metas
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/gravacoes'); ?>">
                        <div class="menu-background menu-gravacoes" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Gravações" data-content="Ouça todas as chamadas de entrada e saída, contando com filtros para uma busca específica.">
                            <i class="fas fa-headphones-alt icon"></i>
                            <br />
                            Gravações
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/pedidos'); ?>">
                        <div class="menu-background menu-pedidos" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Pedidos" data-content="Todos os pedidos listados de acordo com período e operador.">
                            <i class="fas fa-paste icon"></i>
                            <br />
                            Pedidos
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/realtime'); ?>">
                        <div class="menu-background menu-realtime" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Realtime" data-content="Monitore e gerencie em tempo real sua equipe de telemarketing.">
                            <i class="fas fa-clock icon"></i>
                            <br />
                            Realtime
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/campapnhas'); ?>">
                        <div class="menu-background menu-campanhas" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Campanha de Discagem Automática" data-content="Crie e monitore campanhas de leads e de sua carteira de clientes.">
                            <i class="fas fa-bullhorn icon"></i>
                            <br />
                            Campanha de Discagem<br />Automática
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/carteiras'); ?>">
                        <div class="menu-background menu-carteiras" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Carteiras" data-content="Confira sua carteira de clientes filtrando por operador e cliente.">
                            <i class="fas fa-id-card icon"></i>
                            <br />
                            Carteiras
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/leads'); ?>">
                        <div class="menu-background menu-leads" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Leads" data-content="Insira novos prospects e liste os já existentes.">
                            <i class="fas fa-handshake icon"></i>
                            <br />
                            Leads
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/agendamentos'); ?>">
                        <div class="menu-background menu-agendamentos" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Agendamentos" data-content="Agende ligações para um operador específico e confira os agendamentos perdidos.">
                            <i class="fas fa-calendar-check icon"></i>
                            <br />
                            Agendamentos
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/callback'); ?>">
                        <div class="menu-background menu-callback" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Callback" data-content="Confira as ligações abandonadas e não atendidas na fila e agende retorno.">
                            <i class="fas fa-reply icon"></i>
                            <br />
                            Callback
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/voicemail'); ?>">
                        <div class="menu-background menu-voicemail" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="Voicemail" data-content="Ouça as mensagens deixadas no correio de voz agrupadas por fila.">
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
                    <a href="<?= base_url('/comunicados'); ?>">
                        <div class="menu-background menu-comunicados" data-toggle="popover" data-placement="top" data-trigger="hover" title="Comunicados" data-content="Visualize e crie novos comunicados.">
                            <i class="fas fa-bell icon"></i>
                            <br />
                            Comunicados
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/ocorrencias'); ?>">
                        <div class="menu-background menu-ocorrencias" data-toggle="popover" data-placement="top" data-trigger="hover" title="Ocorrências" data-content="Visualize e crie novas ocorrências.">
                            <i class="fas fa-exclamation-triangle icon"></i>
                            <br />
                            Ocorrências
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/relatórios'); ?>">
                        <div class="menu-background menu-relatorios" data-toggle="popover" data-placement="top" data-trigger="hover" title="Relatórios" data-content="Otimize suas decisões com o auxílio de relatórios de faturamento, operadores e chamadas.">
                        <i class="fas fa-signal icon"></i>
                            <br />
                            Relatórios
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 col-xl-3 menu-item">
                    <a href="<?= base_url('/mensagem-marketing'); ?>">
                        <div class="menu-background menu-marketing" data-toggle="popover" data-placement="top" data-trigger="hover" title="Mensagem Marketing" data-content="Crie campanhas de mensagens massivas por meio de SMS, EMAIL e MENSAGEM FONADA.">
                            <i class="fas fa-sms icon"></i>
                            <br />
                            Mensagem Marketing
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> 