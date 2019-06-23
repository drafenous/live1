<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title><?= $page_title ?> - Projeto da Live</title>
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

    <!-- JS -->
    <script src="<?= base_url('node_modules\jquery\dist\jquery.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\popper.js\dist\umd\popper.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\bootstrap\dist\js\bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\@fortawesome\fontawesome-free\js\all.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\moment\min\moment-with-locales.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\tempusdominus-bootstrap-4\build\js\tempusdominus-bootstrap-4.min.js'); ?>"></script>
</head>

<body>