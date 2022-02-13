<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"  lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= base_url('assets/img/logo-light-head.png'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/materialize/css/materialize.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
        <!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>"> -->
        <link rel="stylesheet" href="<?= base_url('assets/css/footer.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/js/morris/morris-0.4.3.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/custom-styles.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/js/Lightweight-Chart/cssCharts.css'); ?>">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title><?= $data['judul'] ?> | <?= $this->session->userdata('role') ?></title>
    </head>
    <body>
        <script src="https://kit.fontawesome.com/5fb17c664a.js" crossorigin="anonymous"></script>
        <div id="wrapper">
            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand waves-effect waves-dark text-center">
                        <img src="<?= base_url('assets/img/logo-white.png'); ?>" width="120px" alt="">
                    </a>
                </div>
                <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
                <ul class="nav navbar-top-links navbar-right d-flex me-3"> 
                    <li><a class="disabled" style="cursor: context-menu;"><i class="fa fa-user fa-fw"></i><b><?= $this->session->userdata('nama') ?></b></a>
                    <li><a href="<?= base_url('kasir/keluar'); ?>"><i class="fas fa-power-off"></i><b>Logout</b></a>
                </ul>
            </nav>
            <!--/. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a class="active-menu waves-effect waves-dark" href="<?= base_url('kasir/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('kasir/registrasi'); ?>" class="waves-effect waves-dark active-menu">
                            <i class="fas fa-user-plus"></i> Registrasi
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('kasir/transaksi'); ?>" class="waves-effect waves-dark active-menu">
                                <i class="fas fa-money-bill-wave"></i> Transaksi
                            </a>
                        </li>
                        <li>
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
        </div>
        <!-- Header -->
        <div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header"><?= $data['judul'] ?></h1>
                <ol class="breadcrumb">
                    <li><a class="text-muted"><?= $data['judul'] ?></a></li>
                    <li><a class="text-muted grey-text"><?= $data['subjudul'] ?></li>
                </ol> 
        <!-- End Header -->
        <!-- Konten -->
    <div id="page-inner">